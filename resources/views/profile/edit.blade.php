<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Settings | LootMarket</title>

    <style>
        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            min-height:100vh;
            font-family:Arial,sans-serif;
            color:#2f2f3a;

            background:
                radial-gradient(circle at 8% 18%, rgba(255,145,210,0.34), transparent 22%),
                radial-gradient(circle at 90% 20%, rgba(120,165,255,0.30), transparent 24%),
                radial-gradient(circle at 50% 95%, rgba(255,210,235,0.42), transparent 30%),
                linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff);
        }

        .page{
            width:min(1180px,calc(100% - 48px));
            margin:55px auto 80px;
        }

        .page-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:24px;
            margin-bottom:36px;
        }

        .eyebrow{
            margin:0 0 10px;
            color:#f05fa5;
            font-size:14px;
            font-weight:900;
            letter-spacing:4px;
            text-transform:uppercase;
        }

        .page-header h1{
            margin:0;

            font-size:50px;
            letter-spacing:-1px;

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
            margin:14px 0 0;
            max-width:630px;
            color:#666678;
            font-size:17px;
            line-height:1.65;
        }

        .back-btn{
            flex-shrink:0;

            padding:15px 24px;
            border-radius:19px;

            color:white;
            text-decoration:none;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 17px 40px rgba(150,130,255,0.28);

            transition:0.25s;
        }

        .back-btn:hover{
            transform:translateY(-3px);
        }

        .profile-summary{
            display:flex;
            align-items:center;
            gap:22px;

            margin-bottom:30px;
            padding:28px;

            border-radius:32px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,240,248,0.82),
                    rgba(242,237,255,0.82),
                    rgba(226,241,255,0.80)
                );

            border:1px solid rgba(255,255,255,0.78);
            backdrop-filter:blur(22px);

            box-shadow:
                0 24px 70px rgba(160,170,255,0.17);
        }

        .profile-avatar{
            width:82px;
            height:82px;
            min-width:82px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:50%;

            color:white;
            font-size:31px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    #ff7eb6,
                    #8f8dff
                );

            box-shadow:
                0 16px 36px rgba(160,130,255,0.28);
        }

        .profile-summary h2{
            margin:0 0 7px;
            font-size:27px;
        }

        .profile-summary p{
            margin:0;
            color:#6f6f80;
        }

        .member-badge{
            display:inline-block;
            margin-top:12px;
            padding:8px 15px;
            border-radius:999px;

            color:#d44784;
            font-size:13px;
            font-weight:900;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.18),
                    rgba(143,141,255,0.17)
                );
        }

        .settings-grid{
            display:grid;
            gap:28px;
        }

        .settings-card{
            padding:32px;

            border-radius:32px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,240,248,0.87),
                    rgba(242,237,255,0.85),
                    rgba(226,241,255,0.83)
                );

            border:1px solid rgba(255,255,255,0.78);
            backdrop-filter:blur(22px);

            box-shadow:
                0 24px 70px rgba(160,170,255,0.16);
        }

        .danger-card{
            background:
                linear-gradient(
                    135deg,
                    rgba(255,235,241,0.90),
                    rgba(255,240,247,0.87),
                    rgba(240,233,255,0.84)
                );

            border-color:rgba(240,95,127,0.18);
        }

        .card-heading{
            display:flex;
            align-items:center;
            gap:16px;
            margin-bottom:27px;
        }

        .heading-icon{
            width:58px;
            height:58px;
            min-width:58px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:20px;
            font-size:27px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,126,182,0.30),
                    rgba(143,141,255,0.24)
                );
        }

        .card-heading h2{
            margin:0 0 6px;
            font-size:25px;
        }

        .card-heading p{
            margin:0;
            color:#777788;
            font-size:14px;
        }

        .form-area{
            max-width:700px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:9px;

            color:#454554;
            font-size:14px;
            font-weight:900;
        }

        input{
            width:100%;

            padding:16px 18px;

            border:1px solid rgba(205,205,225,0.75);
            border-radius:18px;
            outline:none;

            color:#2f2f3a;
            font-family:Arial,sans-serif;
            font-size:15px;

            background:rgba(255,255,255,0.74);

            transition:0.24s;
        }

        input:focus{
            border-color:#ff7eb6;

            box-shadow:
                0 0 0 4px rgba(255,126,182,0.13);
        }

        .field-error{
            margin:8px 0 0;
            color:#dc426d;
            font-size:13px;
            font-weight:700;
        }

        .success-message{
            margin-bottom:25px;
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

        .save-btn,
        .password-btn,
        .delete-btn{
            padding:15px 24px;

            border:none;
            border-radius:18px;

            color:white;
            font-size:15px;
            font-weight:900;

            cursor:pointer;
            transition:0.25s;
        }

        .save-btn,
        .password-btn{
            background:
                linear-gradient(
                    135deg,
                    #ff62a9,
                    #7d8fff
                );

            box-shadow:
                0 15px 35px rgba(150,130,255,0.25);
        }

        .delete-btn{
            background:
                linear-gradient(
                    135deg,
                    #ff8aa5,
                    #ef4f73
                );

            box-shadow:
                0 15px 35px rgba(240,95,127,0.22);
        }

        .save-btn:hover,
        .password-btn:hover,
        .delete-btn:hover{
            transform:translateY(-3px);
        }

        .verify-note{
            margin:0 0 20px;
            padding:15px 18px;

            border-radius:18px;
            color:#765865;
            line-height:1.6;

            background:rgba(255,255,255,0.56);
        }

        .verify-btn{
            padding:0;
            border:none;
            background:transparent;

            color:#d44784;
            font-weight:900;
            cursor:pointer;
            text-decoration:underline;
        }

        .danger-description{
            margin:0 0 22px;
            max-width:720px;

            color:#6f5961;
            line-height:1.7;
        }

        .delete-form{
            max-width:700px;
            margin-top:22px;
            padding-top:22px;
            border-top:1px solid rgba(240,95,127,0.17);
        }

        @media(max-width:760px){
            .page{
                width:min(100% - 28px,1180px);
                margin-top:35px;
            }

            .page-header{
                flex-direction:column;
                align-items:flex-start;
            }

            .page-header h1{
                font-size:39px;
            }

            .profile-summary{
                align-items:flex-start;
            }

            .settings-card{
                padding:23px;
            }
        }
    </style>
</head>

<body>

@include('partials.navbar')

<div class="page">

    <div class="page-header">
        <div>
            <div class="eyebrow">LootMarket Account</div>

            <h1>Account Settings</h1>

            <p>
                Manage your personal information, password and account security
                from one place.
            </p>
        </div>

        <a href="/products" class="back-btn">
            ← Back to Products
        </a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-summary">
        <div class="profile-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <div>
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>

            <span class="member-badge">
                LootMarket Member
            </span>
        </div>
    </div>

    <div class="settings-grid">

        <section class="settings-card">

            <div class="card-heading">
                <div class="heading-icon">👤</div>

                <div>
                    <h2>Profile Information</h2>
                    <p>Update your account name and email address.</p>
                </div>
            </div>

            <form
                method="POST"
                action="{{ route('profile.update') }}"
                class="form-area"
            >
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        autocomplete="name"
                        required
                    >

                    @error('name')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        autocomplete="username"
                        required
                    >

                    @error('email')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                @if($mustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="verify-note">
                        Your email address is unverified.

                        <button
                            form="send-verification"
                            class="verify-btn"
                        >
                            Resend verification email
                        </button>
                    </div>
                @endif

                <button type="submit" class="save-btn">
                    Save Profile
                </button>
            </form>

            @if($mustVerifyEmail && !$user->hasVerifiedEmail())
                <form
                    id="send-verification"
                    method="POST"
                    action="{{ route('verification.send') }}"
                >
                    @csrf
                </form>
            @endif

        </section>

        <section class="settings-card">

            <div class="card-heading">
                <div class="heading-icon">🔐</div>

                <div>
                    <h2>Update Password</h2>
                    <p>Choose a strong password to protect your account.</p>
                </div>
            </div>

            <form
                method="POST"
                action="{{ route('password.update') }}"
                class="form-area"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Current Password</label>

                    <input
                        id="current_password"
                        name="current_password"
                        type="password"
                        autocomplete="current-password"
                        required
                    >

                    @error('current_password', 'updatePassword')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="new-password"
                        required
                    >

                    @error('password', 'updatePassword')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">
                        Confirm New Password
                    </label>

                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        autocomplete="new-password"
                        required
                    >

                    @error('password_confirmation', 'updatePassword')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="password-btn">
                    Update Password
                </button>
            </form>

        </section>

        <section class="settings-card danger-card">

            <div class="card-heading">
                <div class="heading-icon">⚠️</div>

                <div>
                    <h2>Delete Account</h2>
                    <p>Permanently remove your LootMarket account.</p>
                </div>
            </div>

            <p class="danger-description">
                Once your account is deleted, your account information will be
                permanently removed. Enter your current password to confirm this
                action.
            </p>

            <form
                method="POST"
                action="{{ route('profile.destroy') }}"
                class="delete-form"
                onsubmit="return confirm('Are you sure you want to permanently delete your account?');"
            >
                @csrf
                @method('DELETE')

                <div class="form-group">
                    <label for="delete_password">
                        Current Password
                    </label>

                    <input
                        id="delete_password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                    >

                    @error('password', 'userDeletion')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="delete-btn">
                    Delete My Account
                </button>
            </form>

        </section>

    </div>

</div>

</body>
</html>
