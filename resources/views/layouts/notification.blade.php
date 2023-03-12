{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script>
    var userId = "";
    var firebaseConfig = {
       apiKey: "AIzaSyDurnWw_YcrZGhHqW8YYVoaFATeNYQHfik",
        authDomain: "push-notification-29dac.firebaseapp.com",
        projectId: "push-notification-29dac",
        storageBucket: "push-notification-29dac.appspot.com",
        messagingSenderId: "572029365357",
        appId: "1:572029365357:web:2fbc4b27c430a7d06ee364",
        measurementId: "G-0GV5K18XYY"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    $(document).on('change', '.handleByUser', function () {
        userId = $(this).val();
        initFirebaseMessagingRegistration(userId);
    });
    function initFirebaseMessagingRegistration(userId) {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        user_id: userId,
                        token: token
                    },
                    dataType: 'JSON'
                });
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }
    messaging.onMessage(function(payload) {
        console.log('onMessage: ', payload);
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>
