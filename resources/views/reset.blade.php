<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        :root {
            --border-color: #e5e7eb;
        }
    
        body {
            font-family: ui-sans-serif, system-ui, "";
        }
    
        .border {
            border: 1px solid var(--border-color);
        }
    
        .border-b {
            border-bottom: 1px solid var(--border-color);
        }
    
        .font-semibold {
            font-weight: 500;
        }
    
        .font-bold {
            font-weight: 700;
        }
    
        .w-36 {
            width: 9rem;
        }
    
        .flex {
            display: flex;
        }
    
        .justify-center {
            justify-content: center
        }
    
        .rounded-md {
            border-radius: 0.375rem;
        }
    
        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
    
        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
    
        .text-gray-800 {
            color: rgb(31 41 55 / 1);
        }
    
        .text-slate-600 {
            color: rgb(71 85 105 / 1);
        }
    
        .text-slate-700 {
            color: rgb(51 65 85 / 1);
        }
    
        .text-white {
            color: rgb(255 255 255 / 1);
        }
    
        .bg-indigo-700 {
            background-color: rgb(67 56 202 / 1);
        }
    
        .text-indigo-700 {
            color: rgb(67 56 202 / 1);
        }
    
        .p-9 {
            padding: 2.25rem;
        }
    
        .pb-3 {
            padding-bottom: 0.75rem;
        }
    
        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }
    
        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    
        .my-9 {
            margin-top: 2.25rem;
            margin-bottom: 2.25rem;
        }
    
        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    
        .mb-2 {
            margin-bottom: 0.5rem;
        }
    
        .mb-4 {
            margin-bottom: 1rem;
        }
    
        .mb-7 {
            margin-bottom: 1.75rem;
        }
    
        .text-center {
            text-align: center;
        }
    
        .underline {
            text-decoration-line: underline;
        }
    
        .underline-none {
            text-decoration: none;
        }
    
        .cursor-pointer {
            cursor: pointer;
        }
    
        .leading-6 {
            line-height: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="p-3">
        <div class="reset-pass-mail p-9 border rounded-md">
            <div class="">
                <a href="" class="flex pb-3 border-b mb-7"><img draggable="false" class="w-36"
                    src={{ asset('email/simplelogo.png') }} alt=""></a>
    
                <div class="text-sm mb-4 font-semibold text-indigo-700">Hello {{$name}},</div>
                <h1 class="text-2xl font-bold mb-2 text-gray-800">
                    Request For Reseting Password.
                </h1>
                <p class="font-semibold text-sm text-slate-600">We've recieved a request to reset a password for the
                    Ampisva account.You can reset your password by clicking the link below button:</p>
            </div>
            <a href="http://localhost:3000/password_reset/{{$token}}"
                class="flex justify-center underline-none rounded-md bg-indigo-700 text-white px-3 py-2 my-9 text-sm leading-6 shadow-sm">Reset
                new password</a>
            <p class="font-semibold text-sm text-slate-600">If you did not request a reset password, you can safely
                disregard this email <span class="text-slate-700 underline">this link will expire in an hour.</span> If
                your link has expired,you can also send another request</p>
            <div class="my-4">
                <div class="text-center text-sm font-semibold text-indigo-700">Need further assistance?</div>
                <div class="text-center text-sm font-semibold underline text-indigo-700 cursor-pointer">Contact Us</div>
            </div>
    
            <div class="text-slate-700 font-semibold text-sm">
                <div>Sincerely,</div>
                <div>The Ampsiva team</div>
            </div>
    
        </div>
    </div>
</body>
</html>
