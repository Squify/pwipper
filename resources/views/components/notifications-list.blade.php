<div class="dropdown-menu notification-dropdown" id="notificationsDropdown" aria-labelledby="notificationsTitle">
    <div class="dropdown-item notification-item">No notifications</div>
</div>


@section('js')
    <script>
        $(document).ready(function () {

            var $notificationsTitle = $('#notificationsTitle');
            var $notificationsDropdown = $('#notificationsDropdown');

            function loadNotifications() {
                $.ajax({
                    url: "{{ route('notifications') }}",
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        $notificationsDropdown.html("");
                        var nbrNotifs = data.notifications.length;
                        var nbrNotifsNotRead = 0;
                        data.notifications.forEach(notif => {
                            if (!notif.is_read) nbrNotifsNotRead++;
                        })

                        if (nbrNotifs >= 1) {
                            if (nbrNotifsNotRead > 0)
                                $notificationsTitle.html('Notifications (%s)'.replace(/%s/g, nbrNotifsNotRead));
                            else
                                $notificationsTitle.html('Notifications');

                            data.notifications.forEach(notification => {
                                if (notification.is_read) {
                                    $notificationsDropdown.append(`
                                    <div class="display-flex-column notification" id="${notification.pweep_id}" name="${notification.notification_id}">
                                        <a class="dropdown-item notification-item">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            </svg>
                                            <b>${notification.pseudo}</b> ${notification.message}
                                        </a>
                                        <div class="card notification-preview">
                                          <div class="card-body notification-preview-body">
                                            ${notification.pweep_author}<br>
                                            <i>${notification.pweep_message}</i>
                                          </div>
                                        </div>
                                    </div>
                                `);
                                } else {
                                    $notificationsDropdown.append(`
                                    <div class="display-flex-column notification" id="${notification.pweep_id}" name="${notification.notification_id}">
                                        <a style="color: ghostwhite!important;" class="dropdown-item notification-item">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <circle cx="8" cy="8" r="8"/>
                                            </svg>
                                            <b>${notification.pseudo}</b> ${notification.message}
                                        </a>
                                        <div class="card notification-preview">
                                          <div style="color: ghostwhite!important;" class="card-body notification-preview-body">
                                            ${notification.pweep_author}<br>
                                            <i>${notification.pweep_message}</i>
                                          </div>
                                        </div>
                                    </div>
                                `);
                                }

                                $('.notification').click(function () {
                                    console.log($(this).attr("name"), $(this).attr("id"))
                                    readNotifications($(this).attr("name"), $(this).attr("id"));
                                })
                            });
                        } else {
                            $notificationsTitle.html('Notifications');
                            $notificationsDropdown.html('<div class="dropdown-item notification-item">No notifications</div>');
                        }
                    },
                    error: function (err) {
                        console.error(err);
                    }
                });
            }

            function readNotifications(notifId, pweepId) {

                urlReadNotif = "{{ route('readNotification', ':notifId') }}";
                urlReadNotif = urlReadNotif.replace(":notifId", notifId);

                $.ajax({
                    url: urlReadNotif,
                    method: "GET",
                    dataType: "json",
                    success: function () {
                        redirectToPweep(pweepId);
                    },
                    error: function (err) {
                        console.error(err);
                        redirectToPweep(pweepId);
                    }
                });
            }

            function redirectToPweep(pweepId) {
                urlDetails = "{{ route('detailsPweep', ':pweepId') }}";
                urlDetails = urlDetails.replace(":pweepId", pweepId);
                window.location.href = urlDetails;
                loadNotifications();
            }

            @if(Auth::check())
            loadNotifications();

            setInterval(function () {
                loadNotifications();
            }, 5000);
            @endif
        });
    </script>
@endsection
