<!DOCTYPE html>
<html>
<head>
    <title>Support Messages | LootMarket</title>

    <style>
        body{
            margin:0;
            min-height:100vh;
            font-family:Arial,sans-serif;
            color:#2f2f3a;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.35), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.32), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.45), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);
        }

        .page{
            max-width:1150px;
            margin:60px auto;
            padding:0 40px 70px;
        }

        .page-header{
            text-align:center;
            margin-bottom:42px;
        }

        .page-header h1{
            margin:0 0 12px;
            font-size:52px;

            background:
                linear-gradient(
                    90deg,
                    #ff5fa2,
                    #c078ff,
                    #7f9cff
                );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .page-header p{
            margin:0;
            color:#6f6f80;
            font-size:17px;
            line-height:1.6;
        }

        .support-layout{
            display:grid;
            grid-template-columns:0.9fr 1.2fr;
            gap:30px;
            align-items:start;
        }

        .support-form-card,
        .messages-card{
            padding:30px;
            border-radius:32px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,240,248,0.88),
                    rgba(242,237,255,0.86),
                    rgba(226,241,255,0.84)
                );

            border:1px solid rgba(255,255,255,0.75);
            backdrop-filter:blur(22px);

            box-shadow:
                0 24px 70px rgba(160,170,255,0.18);
        }

        .card-title{
            margin:0 0 24px;
            font-size:27px;
            color:#d46f8d;
        }

        label{
            display:block;
            margin:0 0 8px;
            color:#4a4a58;
            font-weight:800;
        }

        input,
        textarea{
            width:100%;
            box-sizing:border-box;

            padding:16px 18px;
            margin-bottom:20px;

            border:1px solid rgba(210,210,230,0.72);
            border-radius:18px;
            outline:none;

            background:rgba(255,255,255,0.74);
            color:#2f2f3a;

            font-family:Arial,sans-serif;
            font-size:15px;

            transition:0.25s;
        }

        textarea{
            min-height:170px;
            resize:vertical;
            line-height:1.6;
        }

        input:focus,
        textarea:focus{
            border-color:#ff7eb6;

            box-shadow:
                0 0 0 4px rgba(255,126,182,0.13);
        }

        .send-btn{
            width:100%;
            padding:17px 22px;

            border:none;
            border-radius:20px;

            color:white;
            font-size:16px;
            font-weight:900;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 18px 45px rgba(150,130,255,0.30);

            transition:0.3s;
        }

        .send-btn:hover{
            transform:translateY(-3px);

            box-shadow:
                0 24px 55px rgba(150,130,255,0.40);
        }

        .success-message{
            margin-bottom:24px;
            padding:15px 18px;

            border-radius:18px;

            color:#246f52;
            font-weight:800;

            background:
                linear-gradient(
                    135deg,
                    rgba(196,255,224,0.84),
                    rgba(213,244,255,0.84)
                );

            border:1px solid rgba(120,220,175,0.35);
        }

        .error-box{
            margin-bottom:24px;
            padding:15px 18px;

            border-radius:18px;

            color:#a83e5d;
            font-weight:700;

            background:rgba(255,225,235,0.82);
            border:1px solid rgba(240,95,127,0.25);
        }

        .messages-list{
            display:flex;
            flex-direction:column;
            gap:20px;
        }

        .message-item{
            padding:22px;
            border-radius:24px;

            background:rgba(255,255,255,0.60);
            border:1px solid rgba(255,255,255,0.72);

            box-shadow:
                0 14px 36px rgba(160,170,255,0.11);
        }

        .message-top{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:18px;
            margin-bottom:15px;
        }

        .message-subject{
            margin:0 0 6px;
            font-size:20px;
            color:#2f2f3a;
        }

        .message-date{
            color:#888;
            font-size:13px;
        }

        .status{
            flex-shrink:0;

            padding:8px 15px;
            border-radius:999px;

            color:white;
            font-size:13px;
            font-weight:900;
        }

        .status-open{
            background:
                linear-gradient(
                    135deg,
                    #ff9fc5,
                    #a892ff
                );
        }

        .status-answered{
            background:
                linear-gradient(
                    135deg,
                    #69d6ad,
                    #73aef5
                );
        }

        .user-message{
            padding:16px 18px;
            border-radius:18px;

            color:#555;
            line-height:1.65;

            background:rgba(255,255,255,0.55);
        }

        .reply-box{
            margin-top:16px;
            padding:17px 18px;

            border-radius:18px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,218,237,0.66),
                    rgba(219,230,255,0.70)
                );

            border-left:4px solid #d46f8d;
        }

        .reply-box strong{
            display:block;
            margin-bottom:8px;
            color:#d46f8d;
        }

        .reply-box p{
            margin:0;
            color:#4d4d5a;
            line-height:1.65;
        }

        .reply-date{
            display:block;
            margin-top:10px;
            color:#888;
            font-size:12px;
        }

        .waiting-reply{
            margin-top:15px;
            color:#8a7382;
            font-size:14px;
            font-style:italic;
        }

        .empty{
            padding:60px 24px;
            text-align:center;

            border-radius:25px;

            color:#777;

            background:rgba(255,255,255,0.55);
        }

        .empty h3{
            margin:0 0 10px;
            color:#d46f8d;
            font-size:25px;
        }

        @media(max-width:900px){
            .support-layout{
                grid-template-columns:1fr;
            }

            .page{
                padding:0 20px 50px;
            }

            .message-top{
                flex-direction:column;
            }
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="page">

    <div class="page-header">
        <h1>Support Messages</h1>

        <p>
            Send a message to the LootMarket support team and view the
            replies to your previous requests.
        </p>
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

    <div class="support-layout">

        <div class="support-form-card">

            <h2 class="card-title">Contact Support</h2>

            <form action="/support-messages" method="POST">
                @csrf

                <label for="subject">Subject</label>

                <input
                    type="text"
                    id="subject"
                    name="subject"
                    maxlength="255"
                    value="{{ old('subject') }}"
                    placeholder="Example: I need help with my order"
                    required
                >

                <label for="message">Message</label>

                <textarea
                    id="message"
                    name="message"
                    maxlength="2000"
                    placeholder="Describe your question or problem..."
                    required
                >{{ old('message') }}</textarea>

                <button type="submit" class="send-btn">
                    Send Message
                </button>
            </form>

        </div>

        <div class="messages-card">

            <h2 class="card-title">My Support Requests</h2>

            @if($supportMessages->count() > 0)

                <div class="messages-list">

                    @foreach($supportMessages as $supportMessage)

                        <div class="message-item">

                            <div class="message-top">

                                <div>
                                    <h3 class="message-subject">
                                        {{ $supportMessage->subject }}
                                    </h3>

                                    <div class="message-date">
                                        Sent on
                                        {{ $supportMessage->created_at->format('d M Y, H:i') }}
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

                            <div class="user-message">
                                {{ $supportMessage->message }}
                            </div>

                            @if($supportMessage->admin_reply)

                                <div class="reply-box">
                                    <strong>LootMarket Support</strong>

                                    <p>
                                        {{ $supportMessage->admin_reply }}
                                    </p>

                                    @if($supportMessage->replied_at)
                                        <span class="reply-date">
                                            Answered on
                                            {{ $supportMessage->replied_at->format('d M Y, H:i') }}
                                        </span>
                                    @endif
                                </div>

                            @else

                                <div class="waiting-reply">
                                    Your request is waiting for a support reply.
                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty">
                    <h3>No support requests yet</h3>
                    <p>Your messages and admin replies will appear here.</p>
                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>
