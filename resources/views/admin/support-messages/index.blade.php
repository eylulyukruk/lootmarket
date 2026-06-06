<!DOCTYPE html>
<html>
<head>
    <title>Admin Support Messages | LootMarket</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.22), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.20), transparent 24%),
                linear-gradient(135deg,#fff7f8,#f8f5f2,#edf5f8);
            color:#2f2f3a;
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        .sidebar{

            width:300px;

            background:
                linear-gradient(
                    180deg,
                    #ffdfe8,
                    #f4dbe2,
                    #dbeaf1
                );

            padding:40px 24px;

            box-sizing:border-box;

            box-shadow:
                0 10px 40px rgba(0,0,0,0.08);

        }

        .admin-logo{
            font-size:26px;
            font-weight:800;
            color:#d46f8d;
            display:flex;
            align-items:center;
            margin-bottom:50px;
            text-decoration:none;
            background:transparent;
            padding:0;
            border-radius:0;
        }

        .admin-logo img{
            width:42px;
            height:42px;
            border-radius:14px;
            margin-right:14px;
        }

        .sidebar .admin-logo{
            background:transparent;
            padding:0;
            margin-bottom:50px;
        }

        .sidebar .admin-logo:hover{
            transform:none;
            background:transparent;
        }

        .sidebar a{

            display:block;

            padding:16px 20px;

            margin-bottom:14px;

            text-decoration:none;

            color:#3a3a3a;

            border-radius:18px;

            background:
                rgba(255,255,255,0.45);

            transition:0.25s;
        }

        .sidebar a:hover{

            transform:translateX(6px);

            background:white;
        }

        .sidebar a.admin-logo{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:12px;

            padding:0;
            margin-bottom:50px;

            background:transparent;
            border-radius:0;

            text-decoration:none;
            color:#d46f8d;

            transform:none;
        }

        .sidebar a.admin-logo:hover{
            background:transparent;
            transform:none;
        }

        .sidebar a.admin-logo img{
            width:42px;
            height:42px;
            border-radius:14px;
            margin:0;
        }

        .sidebar a.admin-logo span{
            font-size:26px;
            font-weight:800;
            color:#d46f8d;
            letter-spacing:-0.5px;
        }

        .content{
            flex:1;
            padding:50px;
        }

        .page-title{
            margin-bottom:32px;
        }

        .page-title h1{
            font-size:42px;
            margin:0 0 8px;
        }

        .page-title p{
            margin:0;
            color:#777;
        }

        .success-message{
            margin-bottom:24px;
            padding:15px 18px;
            border-radius:18px;
            color:#246f52;
            font-weight:800;
            background:linear-gradient(
                135deg,
                rgba(196,255,224,0.84),
                rgba(213,244,255,0.84)
            );
        }

        .error-box{
            margin-bottom:24px;
            padding:15px 18px;
            border-radius:18px;
            color:#a83e5d;
            font-weight:700;
            background:rgba(255,225,235,0.82);
        }

        .messages-list{
            display:flex;
            flex-direction:column;
            gap:24px;
        }

        .message-card{
            padding:28px;
            border-radius:30px;
            background:linear-gradient(
                135deg,
                rgba(255,248,251,0.92),
                rgba(248,244,252,0.92),
                rgba(236,244,255,0.92)
            );
            border:1px solid rgba(255,255,255,0.75);
            box-shadow:0 22px 55px rgba(160,170,255,0.14);
        }

        .message-top{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:20px;
            flex-wrap:wrap;
            margin-bottom:20px;
        }

        .message-subject{
            font-size:24px;
            font-weight:900;
            color:#d46f8d;
            margin-bottom:7px;
        }

        .message-meta{
            color:#777;
            font-size:14px;
            line-height:1.6;
        }

        .status{
            padding:9px 17px;
            border-radius:999px;
            color:white;
            font-weight:900;
            font-size:13px;
        }

        .status-open{
            background:linear-gradient(135deg,#ff9fc5,#a892ff);
        }

        .status-answered{
            background:linear-gradient(135deg,#69d6ad,#73aef5);
        }

        .customer-box,
        .question-box,
        .current-reply{
            padding:17px 19px;
            border-radius:20px;
            margin-bottom:16px;
            background:rgba(255,255,255,0.58);
            border:1px solid rgba(255,255,255,0.66);
        }

        .customer-box strong,
        .question-box strong,
        .current-reply strong{
            display:block;
            margin-bottom:8px;
            color:#d46f8d;
        }

        .question-box p,
        .current-reply p{
            margin:0;
            color:#50505c;
            line-height:1.65;
            white-space:pre-wrap;
        }

        .reply-form{
            margin-top:20px;
        }

        .reply-form label{
            display:block;
            margin-bottom:9px;
            font-weight:800;
        }

        .reply-form textarea{
            width:100%;
            box-sizing:border-box;
            min-height:130px;
            padding:16px 18px;
            border-radius:18px;
            border:1px solid rgba(210,210,230,0.72);
            outline:none;
            resize:vertical;
            font-family:Arial,sans-serif;
            font-size:15px;
            background:rgba(255,255,255,0.72);
        }

        .reply-form textarea:focus{
            border-color:#ff7eb6;
            box-shadow:0 0 0 4px rgba(255,126,182,0.13);
        }

        .reply-btn{
            margin-top:14px;
            padding:14px 22px;
            border:none;
            border-radius:18px;
            color:white;
            font-weight:900;
            cursor:pointer;
            background:linear-gradient(135deg,#ff62a9,#7d8fff);
            box-shadow:0 14px 34px rgba(150,130,255,0.24);
        }

        .empty{
            padding:65px 30px;
            text-align:center;
            border-radius:30px;
            color:#777;
            background:rgba(255,255,255,0.72);
        }

        .admin-profile-box{
            margin-top:34px;
            padding:18px;
            display:flex;
            align-items:center;
            gap:14px;
            border-radius:22px;
            background:linear-gradient(
                135deg,
                rgba(255,255,255,0.58),
                rgba(235,242,255,0.58)
            );
        }

        .admin-avatar{
            width:44px;
            height:44px;
            min-width:44px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            color:white;
            font-weight:900;
            background:linear-gradient(135deg,#ff7eb6,#8f8dff);
        }

        .admin-profile-box strong{
            display:block;
            font-size:15px;
        }

        .admin-profile-box span{
            display:block;
            margin-top:3px;
            color:#777;
            font-size:13px;
        }

        .admin-logout-form{
            margin-top:14px;
        }

        .admin-logout-btn{
            width:100%;
            padding:15px 20px;
            border:none;
            border-radius:18px;
            color:white;
            font-weight:900;
            cursor:pointer;
            background:linear-gradient(135deg,#ff8aa5,#f05f7f);
        }
    </style>
</head>

<body>

<div class="layout">

    @include('admin.partials.sidebar')

    <div class="content">

        <div class="page-title">
            <h1>Support Messages</h1>
            <p>Review customer requests and send support replies.</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif

        @if($supportMessages->count() > 0)

            <div class="messages-list">

                @foreach($supportMessages as $supportMessage)

                    <div class="message-card">

                        <div class="message-top">

                            <div>
                                <div class="message-subject">
                                    {{ $supportMessage->subject }}
                                </div>

                                <div class="message-meta">
                                    Ticket #SM-{{ str_pad($supportMessage->id, 5, '0', STR_PAD_LEFT) }}
                                    <br>
                                    Sent {{ $supportMessage->created_at->format('d M Y, H:i') }}
                                </div>
                            </div>

                            <span
                                class="status
                                {{ $supportMessage->status === 'Answered'
                                    ? 'status-answered'
                                    : 'status-open' }}"
                            >
                                {{ $supportMessage->status }}
                            </span>

                        </div>

                        <div class="customer-box">
                            <strong>Customer</strong>
                            {{ $supportMessage->user->name ?? 'Unknown User' }}
                            —
                            {{ $supportMessage->user->email ?? 'No email' }}
                        </div>

                        <div class="question-box">
                            <strong>Customer Message</strong>
                            <p>{{ $supportMessage->message }}</p>
                        </div>

                        @if($supportMessage->admin_reply)

                            <div class="current-reply">
                                <strong>Current Admin Reply</strong>

                                <p>{{ $supportMessage->admin_reply }}</p>
                            </div>

                        @endif

                        <form
                            action="/admin/support-messages/{{ $supportMessage->id }}/reply"
                            method="POST"
                            class="reply-form"
                        >
                            @csrf

                            <label for="reply-{{ $supportMessage->id }}">
                                {{ $supportMessage->admin_reply
                                    ? 'Update Reply'
                                    : 'Write Reply' }}
                            </label>

                            <textarea
                                id="reply-{{ $supportMessage->id }}"
                                name="admin_reply"
                                maxlength="2000"
                                placeholder="Write your reply to the customer..."
                                required
                            >{{ $supportMessage->admin_reply }}</textarea>

                            <button type="submit" class="reply-btn">
                                {{ $supportMessage->admin_reply
                                    ? 'Update Reply'
                                    : 'Send Reply' }}
                            </button>
                        </form>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                No support messages yet.
            </div>

        @endif

    </div>

</div>

</body>
</html>
