<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="/control-frontend/favicon.ico">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="theme-color" content="#000000">
        <meta name="description" content="Web site created using create-react-app">
        <link rel="apple-touch-icon" href="/control-frontend/logo192.png">
        <link rel="manifest" href="/control-frontend/manifest.json">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
        <title>Control App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        
        <div class="mb-4 container-fluid">
            <div class="row" style="display: flex; justify-content: between;">
                <div class="p-2 col-8">
                    <h2 class="p-2 text-light">Controller &nbsp;
                        <font style="font-size: 1.8rem;">
                            <span class="glow badge rounded-pill bg-danger">Live</span>
                        </font>
                    </h2>
                </div>
                <div class="p-2 col-4 d-flex justify-content-end">
                    <!-- Profile Dropdown Menu -->
                    <div class="nav-item dropdown">
                        <div class="dropdown">
                            <a class="nav-link" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-panel pt-0 d-flex">
                                    <div class="image">
                                      <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="image-circle" alt="User Image" >
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-user mr-2"></i> View Profile
                                </a>
                            </li>
                              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear mr-2"></i> Setting</a></li>
                              <div class="dropdown-divider"></div>
                              <li>
                                    <form method="POST" class="m-0" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button type="submit" class="dropdown-item p-0 m-0" @click.prevent="$root.submit();">
                                            <span class="dropdown-item">
                                            <i class="fa-solid fa-right-from-bracket mr-2"></i> {{ __('Log Out') }}
                                            {{-- <span class="float-right text-muted text-sm">2 days</span> --}}
                                            </span>
                                        </button>
                                    </form>    
                                </li>
                                <div class="dropdown-divider"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($menus as $item)
                    <div class="p-2 p-md-3 col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card" style="background: {{$item->color_code}}">
                            <div class="p-3 pt-4 p-md-4 card-body">
                                <div class="card-title h5 pb-3" style="display: flex; justify-content: center; align-items: center;">
                                    <font style="font-size: 0.8rem;">
                                        {{$item->name}}
                                        <b style="font-weight: 950;font-size: 1.2rem;">{{$item->name}}</b>
                                    </font>       
                                </div>
                                <div class="w-100 h-100 d-flex justify-content-center">
                                    <i class="{{$item->icon}}" style="font-size: 4rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No Records
                @endforelse
                @for ($i = 0; $i < 8; $i++)
                    <div class="p-2 p-md-3 col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card" style="background: rgb(250, 130, 49); ">
                            <div class="p-3 pt-4 p-md-4 card-body">
                                <div class="card-title h5 pb-3" style="display: flex; justify-content: center; align-items: center;">
                                    <font style="font-size: 0.8rem;">
                                        Power 
                                        <b style="font-weight: 950;font-size: 1.2rem;">On/Off</b>
                                    </font>       
                                </div>
                                <div class="w-100 h-100 d-flex justify-content-center">
                                    <i class="fa-solid fa-power-off" style="font-size: 4rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                
                
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
