<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Ronley Tsutomu Minoru Vinberk" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
        <title>CRUD Laravel</title>
    </head>
    <body>
        <!-- start body -->

        <div class="container-fluid">
            <!-- start container -->

            <div class="row pt-5">
                <!-- start row -->

                <div class="col-sm-12 col-md-3 offset-md-3">
                <h2 class="form-signin-heading pt-5">CRUD Laravel</h2>
                </div>
                <div class="col-sm-12 col-md-3">
                    <!-- start col -->

                    @if (session('failed_login'))
                        <div class="alert alert-warning">
                            {{ session('failed_login') }}
                        </div>
                    @endif
                    <h4 class="form-signin-heading" align="center" style="text-transform: uppercase;">Login</h4>
                    <form action="{{url("login")}}" method="post" class="form-signin" id="">
                        {{ csrf_field() }}
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus />
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="off" />
                        <button class="btn btn-lg btn-primary btn-block" type="submit">LOGIN</button>
                    </form>
                    <div align="center"><small>&copy; 2018 CRUD Laravel | Created by Ronley Tsutomu Minoru Vinberk | Framework by Laravel</small></div>

                    <!-- end col -->
                </div>

                <!-- end row -->
            </div>

            <!-- end container -->
        </div>
        <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

        <!-- Datatables -->
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#tableusers').DataTable();
        });
        </script>

        <!-- end body -->
    </body>
</html>
