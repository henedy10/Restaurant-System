<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="chat-container">
  {{-- <!-- Sidebar -->
  <div class="sidebar">
    <div class="p-3 border-bottom border-dark">
      <h5 class="mb-0">Contacts</h5>
    </div>
    <div class="chat-list">
        @forelse ( $contacts as $contactName )
            <div class="chat-item">{{$contactName}}</div>
        @empty
            * there no any contact
        @endforelse
    </div>
  </div> --}}

    <!-- Chat Box -->
    <div class="chat-box d-flex flex-column">
        <div class="chat-header">
            <h6 class="mb-0">أحمد فيصل</h6>
        </div>
        <div class="chat-messages d-flex flex-column">
            <div class="message received">إزيك يا أحمد، عامل إيه؟</div>
            <div class="message sent">الحمد لله تمام، وانت؟</div>
            <div class="message received">تمام والله، شغال على المشروع الجديد؟</div>
            <div class="message sent">أه شغال عليه دلوقتي 😎</div>
        </div>
        <div class="chat-input d-flex align-items-center">
            <input type="text" class="form-control me-2" placeholder="اكتب رسالة...">
            <button class="btn">إرسال</button>
        </div>
    </div>
</div>
</body>
</html>
