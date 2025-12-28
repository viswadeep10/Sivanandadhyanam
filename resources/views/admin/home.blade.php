@extends('admin.layouts.admin-layout')
@section('title', 'Dashboard')
@section('content')
  <style>

  /* New */
  .chat_inbox .row { display: flex;}
  /* .chat_inbox .chat_wrapper { width: 50%;} */
  .chat_inbox .chat_wrapper.chat_users { height: 521px; overflow-y: auto;}
  .chat_inbox .chat_users { background-color: #fff; border-radius: 15px;}
  .chat_inbox .chat_users .chat_list { border-bottom: 1px solid #c4c4c4; margin: 0; padding: 18px 16px 10px; display: flex; justify-content: space-between;}
  .chat_list.active {background:#2196f3}
  .chat_inbox .chat_users .chat_list:last-child { border: none;}
  .chat_inbox .chat_users .chat_list .chat_time { font-size: 12px; width:10%}
  .chat_inbox .chat_users .chat_list .chat_u_img { width: 50px; height: 50px;}
  .chat_inbox .chat_users .chat_list .chat_u_img img { width: 100%; object-fit: contain;}
  .chat_inbox .chat_users .chat_list .u_msg_detail { padding: 0 15px;width:75%}
  .chat_inbox .chat_users .chat_list .u_msg_detail { padding: 0 15px;}
  .chat_inbox .chat_box .msg_container .form-control { height: 48px; border-radius: 6px 0 0 6px; }

  .chat_inbox .chat_box { background: #F3EBE1; border-radius: 0 15px 15px 0; height: 100%;}
  .chat_inbox .chat_box .chat_head { background: #FF9215; color: #fff; border-radius: 15px 15px 0 0; padding: 30px;}
  .chat_inbox .chat_box .chat_head p { margin-bottom: 0; font-size: 15px;}
  .chat_inbox .chat_box .chat_head p strong { font-size: 20px;}
  .chat_inbox .chat_box .msg_container { padding: 20px 20px 0; position: relative; overflow-y: auto;}
  .chat_inbox .chat_box .msg_container .messages { height: 380px; overflow-y: auto;}
  .chat_inbox .chat_box .msg_container .msg { padding: 20px; box-shadow: 0px 2px 2px rgba(0,0,0,0.1); background: #fff; border-radius: 15px; margin-bottom: 10px; width: 96%;}
  .chat_inbox .chat_box .msg_container .msg p { margin: 0; font-size: 16px; line-height: 23px;}
  .chat_inbox .chat_box .msg_container .type_msg { margin-top: 50px; background: #F3EBE1; padding: 5px 5px 17px; position: sticky; bottom: 0; left: 0; width: 100%;}
  .chat_inbox .chat_box .msg_container .type_msg .btn-primary { background: #FF9215; width: 48px; height: 48px; border-radius: 0 6px 6px 0; outline: none; border: none; }
  .chat_inbox .chat_box .msg_container .type_msg .btn-primary img { width: 18px; height: 18px; }

  .chat_inbox .chat_box .msg_container .msg.sender:before { content: ''; width: 0px; height: 0px; border-style: solid; border-width: 8px 0 8px 12px; border-color: transparent transparent transparent #f6dcbd; display: inline-block; vertical-align: middle; margin-right: 5px; position: absolute; right: -17px; }
  .chat_inbox .chat_box .msg_container .msg.sender { position: relative; background: #f6dcbd; }
  .chat_inbox .chat_box .msg_container .msg.receiver:before { content: ''; width: 0px; height: 0px; border-style: solid; border-width: 8px 12px 8px 0; border-color: transparent #ffffff transparent transparent; display: inline-block; vertical-align: middle; margin-right: 5px; position: absolute; left: -12px; }
  .chat_inbox .chat_box .msg_container .msg.receiver { position: relative; }

  </style>
    

  <div class="chat_inbox">
    <div class="row">
      <div class="chat_wrapper chat_users col-md-4">
          <div class="chat_list">
            <h4>Recent</h4>
          </div>
          @if($chats) 
                @foreach($chats as $chat)
          <div class="chat_list" onclick="startChat(this,'{{$chat->user->name}}',{{$chat->id}})">
            <div class="chat_u_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="user"> </div>
            <div class="u_msg_detail">
              <h6>{{$chat->user->name ?? ''}}</h6>
              <p class="u_msg">{{$chat->messages->last()->message}}</p>
            </div>
            <div class="chat_time">{{ date("M j", strtotime($chat->messages->last()->created_at))}}</div>
          </div>
          @endforeach
           @endif
      </div>
      <div class="chat_wrapper chat_box col-md-6">
        <div class="msg_container">
          <div class="messages">
            <!-- <div class="msg receiver">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div>
            <div class="msg receiver">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div>
            <div class="msg sender">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div>
            <div class="msg sender">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div>
            <div class="msg receiver">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div>
            <div class="msg sender">
              <p>In line with regulatory guidelines, individuals must report all sources of income, including details of shares and investments.</p>
            </div> -->
          </div>
          <div class="input-group type_msg">
            <input class="form-control" placeholder="Type message..." id="msg">
            <button class="btn-primary text-white" onclick="sendMessage()"><img src="{{asset('assets/front/img/send.png')}}"></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

  <script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
  });

 Pusher.logToConsole = true;

    // Init Pusher
    var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        authEndpoint: "{{ url('/broadcasting/auth') }}",
           auth: {
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        }
    },
        withCredentials: true 

    });
  let activeChannel = null;
   var chatID = 0; 

  function startChat(ele,uname,chat_id)
  {
    $('.messages').html('');
      document.querySelectorAll('.chat_list').forEach(function(item) 
      {
      item.classList.remove('active');
      })

    ele.classList.add('active')

  if (activeChannel) 
  {
          activeChannel.unsubscribe();
  }
  chatID = chat_id;
  activeChannel = pusher.subscribe('private-chat.' + chat_id);
          console.log(activeChannel)

        activeChannel.bind('message.sent', function (data) {
          $('.messages').append(`
              <div class="msg sender">
              <p>${data.message.message}</p>
            </div>
          `);
          scrollDown();
      });
//load history
messageHistory(chat_id);
  }

function messageHistory(chatId)
{

   $.ajax({
        url : "{{ route('messageHistory') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            chat_id: chatId,
        },
        type : 'POST',
        dataType : 'json',
        success : function(result)
        {
         if(result.length>0)
        {
        result.forEach(m => {
              $('.messages').append(`
                  <div class="msg ${m.sender_role == 'User' ? 'sender' : 'receiver'}">
                      ${m.message}
                  </div>
              `);
          });
          scrollDown();
        }

        }
    });
}
function sendMessage()
{
  
     let msg = $('#msg').val().trim();
        if(!msg) return;
        if(chatID>0)
        {
        $.ajax({
        url : "{{ route('message') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            chat_id: chatID,
            message: msg
        },
        type : 'POST',
        dataType : 'json',
        success : function(result)
        {
        $('.messages').append(`
          <div class="msg receiver">${msg}</div>
        `);
        $('#msg').val('');
        scrollDown();
        }
    });
  }
}
  function scrollDown() {
      let box = document.getElementsByClassName('messages')[0];
      box.scrollTop = box.scrollHeight;
  }
  </script>
@endsection

