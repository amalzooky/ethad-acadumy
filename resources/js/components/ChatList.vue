<template>
  <div class="messaging">
    <div class="inbox_msg">
      <div class="mesgs">
        <div class="msg_history" id="msg_history">
          <div v-if="showLoaderLoadMessages" class="loader m15-auto"></div>
          <div v-for="msg in messages" :key="msg.id">
            <div class="incoming_msg" v-if="user_id != msg.from_id">
              <div class="incoming_msg_img">
                <img :src="'/'+msg.from_user.avatar" alt="sunil">
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <span class="time_date text-right">
                    <strong>{{msg.from_user.full_name}}</strong>
                  </span>
                  <p>{{msg.message}}</p>
                  <span class="time_date"></span>
                </div>
              </div>
            </div>

            <div class="outgoing_msg" v-if="user_id == msg.from_id">
              <div class="sent_msg">
                <p>{{msg.message}}</p>
                <span class="time_date"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="type_msg" v-if="chat_id">
          <div class="input_msg_write">
            <form style="width:100%" v-on:submit.prevent="sendMessage">
              <input type="text" class="write_msg" placeholder="Type a message" v-model="message">
            </form>
          </div>
        </div>
      </div>
      <div class="inbox_people">
        <div style="width:100%" class="btn-group" role="group">
          <button
            @click="changeMode('students')"
            type="button"
            :class="mode=='students'?'btn-active':''"
            class="btn-switch-chat btn btn-block btn-primary"
          >
            <span v-if="userRole=='owner'">الطلاب</span>
            <span v-if="userRole!='owner'">الرسائل</span>
          </button>
          <button
            @click="changeMode('teachers')"
            type="button"
            :class="mode=='teachers'?'btn-active':''"
            class="btn-switch-chat btn btn-block btn-primary"
            v-if="userRole=='owner'"
          >المعلمين</button>
          <button
            @click="changeMode('groups')"
            type="button"
            :class="mode=='groups'?'btn-active':''"
            class="btn-switch-chat btn btn-block btn-primary"
          >المجموعات</button>
        </div>
        <div>
          <div class="form-group" v-if="userRole=='owner'">
            <input
              class="form-control"
              @keyup="searchChatList"
              v-model="search"
              placeholder="بحث..."
            >
          </div>
        </div>
        <div class="inbox_chat" v-scroll-loadmore="loadMoreChatList">
          <div
            v-for="(chat,index) in chatsList"
            :key="index"
            class="chat_list"
            :class="this.to_id == chat.id ?'active_chat':''"
            @click="getMessagesChat(chat)"
          >
            <div class="chat_people">
              <div class="chat_img">
                <img :src="chat.avatar" :alt="chat.name">
              </div>
              <div class="chat_ib">
                <h5>{{chat.name}}</h5>
              </div>
            </div>
          </div>
          <div v-if="showLoaderLoadChat" class="loader m15-auto"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created: function() {
    if (this.chatUserslect) {
      this.getMessagesChat(JSON.parse(this.chatUserslect));
    }
    this.getChatsList();
    const messaging = firebase.messaging();
    messaging
      .requestPermission()
      .then(() => {
        // if ("serviceWorker" in navigator) {
        //   navigator.serviceWorker
        //     .register(
        //       "http://localhost/www/alrateb/public/firebase-messaging-sw.js"
        //     )
        //     .then(registration => {
        //       messaging.useServiceWorker(registration);

          messaging
            .getToken()
            .then(currentToken => {
              this.updateToken(currentToken);
              this.listeningOnMessage();
            })
            .catch(err => {});
            
        //   })
        //   .catch(err => {});
        // }

      })
      .catch(err => {
        console.log("Unable to get permission to notify.", err);
      });
  },
  data: function() {
    return {
      chatsList: [],
      messages: [],
      mode: "students",
      user_id: 0,
      chat_id: 0,
      to_id: 0,
      to_type: "",
      message: "",
      showLoaderLoadChat: false,
      busy: false,
      showLoaderLoadMessages: false,
      search: ""
    };
  },
  props: ["userRole", "chatUserslect"],
  methods: {
    loadMoreChatList: function() {
      if (this.search) {
        this.searchChatList();
      } else {
        this.getChatsList();
      }
    },
    searchChatList: function() {
      if (this.search) {
        this.showLoaderLoadChat = true;
        axios
          .get(
            "/dashboard/chats/search-chat-list?mode=" +
              this.mode +
              "&skip=" +
              this.chatsList.length +
              "&search=" +
              this.search
          )
          .then(response => {
            this.chatsList = response.data;
            this.showLoaderLoadChat = false;
          })
          .catch(e => {
            this.showLoaderLoadChat = false;
            console.log("Error Search  Chat List :", e);
          });
      } else {
        this.chatsList = [];
        this.showLoaderLoadChat = true;
        this.getChatsList();
      }
    },
    getChatsList: function() {
      if (!this.showLoaderLoadChat) {
        this.showLoaderLoadChat = true;

        axios
          .get(
            "/dashboard/chats/get-chat-list?mode=" +
              this.mode +
              "&skip=" +
              this.chatsList.length
          )
          .then(response => {
            this.chatsList = [...this.chatsList, ...response.data];
            console.log("Chat List :", this.chatsList);
            this.showLoaderLoadChat = false;
          })
          .catch(e => {
            this.showLoaderLoadChat = false;
            console.log("Error Get Chat List :", e);
          });
      }
    },
    getMessagesChat(chat) {
      this.showLoaderLoadMessages = true;
      this.messages = [];
      this.to_id = chat.id;
      this.to_type = chat.mode;
      this.loadMesages(false, chat.chat_id);
    },
    loadMesages(loadMore, chatListId = 0) {
      const params =
        "?skip=" +
        this.messages.length +
        "&to_id=" +
        this.to_id +
        "&to_type=" +
        this.to_type +
        "&chat_id=" +
        chatListId;

      // this.busy = loadMore;
      axios
        .get("/dashboard/chats/loadMessages" + params)
        .then(response => {
          if (loadMore) {
            this.messages = [...this.messages, response.data.msgs];
          } else {
            this.messages = response.data.msgs;
          }
          this.chat_id = response.data.chat_id;
          this.user_id = response.data.user_id;
          this.showLoaderLoadMessages = false;
          console.log("mesg ", this.messages);
          setTimeout(() => {
            this.scrollEnd();
          }, 200);
          this.busy = false;
        })
        .catch(e => {
          this.busy = false;
          console.log("Error Load Messages :", e);
        });
    },
    changeMode: function(mode) {
      this.mode = mode;
      this.search = "";
      this.chatsList = [];
      this.messages = "";
      this.chat_id = 0;
      this.getChatsList();
    },
    sendMessage() {
      if (!this.message) {
        return;
      }

      let params = {
        to_id: this.to_id,
        msg: this.message,
        chat_id: this.chat_id
      };
      this.messages = [
        ...this.messages,
        {
          from_id: this.user_id,
          message: this.message
        }
      ];
      setTimeout(() => {
        this.scrollEnd();
      }, 200);

      this.message = "";
      axios
        .post("chats/sendMessage", params)
        .then(response => {
          this.message = "";
          console.log("Send Message :", response);
        })
        .catch(e => {
          console.log("Error Send Message :", e);
        });
    },
    updateToken(token) {
      console.log("Save Token :", token);
      axios
        .post("chats/token", { token })
        .then(response => {})
        .catch(e => {});
    },

    scrollEnd() {
      var container = this.$el.querySelector("#msg_history");
      container.scrollTop = container.scrollHeight;
    },
    listeningOnMessage() {
      firebase.messaging().onMessage(message => {
        let data = message.data;
        let key = data.key;
        if (this.chat_id == data.chat_id && key == "SEND_MESSAGE") {
          let msg = JSON.parse(data.msg);
          if (msg.from_id != this.user_id) {
            this.messages = [...this.messages, msg];
            setTimeout(() => {
              this.scrollEnd();
            }, 200);
          }
        }
      });
    }
  }
};
</script>



<style>
.btn-switch-chat {
  margin: 0 !important;
  outline: none !important;
}
.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-switch-chat.btn-active {
  color: #fff;
  background-color: #316cbe;
  border-color: #2f66b3;
  border-bottom: 3px solid #4d4d4d;
}
.container {
  max-width: 1170px;
  margin: auto;
}
img {
  max-width: 100%;
}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%;
  border-left: 1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac {
  margin: 20px 0 0;
}

.recent_heading {
  float: left;
  width: 40%;
}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch {
  padding: 10px 29px 10px 20px;
  overflow: hidden;
  border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input {
  border: 1px solid #cdcdcd;
  border-width: 0 0 1px 0;
  width: 80%;
  padding: 2px 0 4px 6px;
  background: none;
}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon {
  margin: 0 0 0 -27px;
}

.chat_ib h5 {
  font-size: 15px;
  color: #464646;
  margin: 0 8px 0px 0;
  text-align: right;
}
.chat_ib h5 span {
  font-size: 13px;
  float: right;
}
.chat_ib p {
  font-size: 14px;
  color: #989898;
  margin: 0 8px 0px 0;
}
.chat_img {
  float: right;
  width: 11%;
}
.chat_img img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
}
.chat_ib {
  float: right;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people {
  overflow: hidden;
  clear: both;
}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
  cursor: pointer;
}
.inbox_chat {
  height: 615px;
  overflow-y: scroll;
}

.active_chat {
  background: #ebebeb;
}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.incoming_msg_img img {
  width: 32px;
  height: 32px;
  border: 1px solid #295a9f;
  border-radius: 50%;
}
.incoming_msg {
  direction: ltr;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}
.received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg {
  width: 57%;
}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

.sent_msg p {
  background: #295a9f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.outgoing_msg {
  overflow: hidden;
  margin: 26px 0 26px;
}
.sent_msg {
  float: right;
  width: 46%;
}

.input_msg_write {
  display: flex;
  justify-content: center;
  align-items: center;
}
.input_msg_write input {
  background: #fff;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;

  padding-right: 10px;
  margin: 10px;
  border: 1px solid #ddd;
  border-radius: 20px;
  outline: none;
}

.type_msg {
  border-top: 1px solid #c4c4c4;
  position: relative;
}
.msg_send_btn {
  border: medium none;
  color: #fff;
  cursor: pointer;
  background: transparent;
}
.msg_send_btn i {
  font-size: 29px;
  color: #4d4d4d;
}
.messaging {
  width: 100%;
  padding: 0 0 50px 0;
}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.m15-auto {
  margin: 15px auto;
}
</style>