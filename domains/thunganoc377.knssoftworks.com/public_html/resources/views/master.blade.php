<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Ốc</title>

    <!-- Custom fonts for this template-->
    <base href="{{asset(' ')}}"/>
    <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="source/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="source/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                @include('header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn muốn đăng xuất khỏi hệ thống?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </div>





    <!-- Bootstrap core JavaScript-->
    <script src="source/vendor/jquery/jquery.min.js"></script>
    <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="source/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="source/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="source/js/demo/datatables-demo.js"></script>




    <!-- Page level plugins -->
    <script src="source/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="source/js/demo/chart-area-demo.js"></script>
    <script src="source/js/demo/chart-pie-demo.js"></script>

   <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>




    <script type="text/javascript">

      var notificationsWrapper   = $(".dropdown-notifications");
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('div.noti-senpai');

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('321e883e8600dd60bca3', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');

/*
    var channel2 = pusher.subscribe('add-channel');
    channel2.bind('add-event', function(data) {
        //{"message":"Someone"}
      alert(JSON.stringify(data));
    });
*/


      channel.bind('my-event', function(data) {

new Audio('source/arkham.wav').play();

var currentdate = new Date();
//var datetime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
var datetime = currentdate.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");


        var existingNotifications = notifications.html();
        var newNotificationHtml = `



                                <a class="dropdown-item d-flex align-items-center" href="{{route('manage_bill')}}">
                                    <div class="mr-3">
                                        <div class="icon-circle `+data.div+`">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">`+datetime+`</div>
                                        <span class="font-weight-bold">Bàn `+data.id+` `+data.message+`</span>
                                    </div>
                                </a>





        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.badge-counter').text(notificationsCount);
        notificationsWrapper.show();
      });
    </script>





</body>

</html>