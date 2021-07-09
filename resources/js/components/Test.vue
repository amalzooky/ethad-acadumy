<template>
  <div class="messaging">
    <div class="inbox_msg">
      <div class="mesgs">
        <div class="msg_history">
          <div class="incoming_msg">
            <div class="incoming_msg_img">
              <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
            </div>
            <div class="received_msg">
              <div class="received_withd_msg">
                <p>
                  Test which is a new approach to have all
                  solutions
                </p>
                <span class="time_date">11:01 AM | June 9</span>
              </div>
            </div>
          </div>
          <div class="outgoing_msg">
            <div class="sent_msg">
              <p>
                Test which is a new approach to have all
                solutions
              </p>
              <span class="time_date">11:01 AM | June 9</span>
            </div>
          </div>
        </div>
        <div class="type_msg">
          <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Type a message">
            <button class="msg_send_btn" type="button">
              <i class="fe fe-navigation" aria-hidden="true"></i>
            </button>
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
          >الطلاب</button>
          <button
            @click="changeMode('teachers')"
            type="button"
            :class="mode=='teachers'?'btn-active':''"
            class="btn-switch-chat btn btn-block btn-primary"
          >المعلمين</button>
          <button
            @click="changeMode('groups')"
            type="button"
            :class="mode=='groups'?'btn-active':''"
            class="btn-switch-chat btn btn-block btn-primary"
          >المجموعات</button>
        </div>
        <div class="inbox_chat">
          <div v-if="showLoaderLoadChat" class="loader m15-auto"></div>
          <div
            v-for="(chat,index) in chatsList"
            :key="index"
            class="chat_list active_chat"
            @click="getMessagesChat(chat)"
          >
            <div class="chat_people">
              <div class="chat_img">
                <img :src="'/'+chat.avatar" alt="sunil">
              </div>
              <div class="chat_ib">
                <h5>{{chat.name}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>