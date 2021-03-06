<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="./CSS Files/css2.css">
</head>

<body>
    <nav>
        <div class="container">
            <h2 class="log">Finder</h2>
            <div class="searchbar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Search" id="searchbarinput">
            </div>
            <div class="logout">
                <a href="login.html"><button class="btn btn-primary">Logout</button></a>
            </div>
            <div class="profilepicture">
                <a href="settings.html"><img src="./images/blank-profile-picture.png" alt="Profile"></a>
            </div>
        </div>
    </nav>
    <main>
        <div class="row">
            <div class="left col-sm-2 offset-1">
                <a class="profile">
                    <div class="profilepicture">
                        <img src="./images/blank-profile-picture.png" alt="profilepicture">
                    </div>
                    <div class="handle">
                        <h4>Yes</h4>
                        <p class="text-medium">
                            @yessir
                        </p>
                    </div>
                </a>

                <div class="sidebar">
                    <a href="#" class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>
                    </a>
                    <a href="#" class="menu-item">
                        <span><i class="uil uil-compass"></i></span>
                        <h3>Everyone</h3>
                    </a>
                    <a href="#" class="menu-item" id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">2</small></i></span>
                        <h3>Notifications</h3>
                        <div class="notifications-popup">
                            <div>
                                <div class="profilepicture">
                                    <img src="./images/blank-profile-picture.png" alt="hi">
                                </div>
                                <div class="notification-body">
                                    <b>jane doe</b> accepted your request
                                    <small class="text-medium">2 DAYS AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profilepicture">
                                    <img src="./images/blank-profile-picture.png" alt="hi">
                                </div>
                                <div class="notification-body">
                                    <b>john doe</b> didnt accepted your request
                                    <small class="text-medium">1 DAY AGO</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a href="settings.html" class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Settings</h3>
                    </a>
                </div>
            </div>

            <div class="customise-theme">
                <div class="card">
                    <h2>customise your view</h2>
                    <p>Manage your font size and background.</p>
                    <div class="font-size">
                        <h4>font size</h4>
                        <div>
                            <h6>Aa</h6>
                            <div class="choose-size">
                                <span class="font-size-1"></span>
                                <span class="font-size-2"></span>
                                <span class="font-size-3 active"></span>
                                <span class="font-size-4"></span>
                                <span class="font-size-5"></span>
                            </div>
                            <h3>Aa</h3>
                        </div>
                    </div>

                    <div class="background">
                        <h4>Background</h4>
                        <div class="choose-background">
                            <div class="background-1 active">
                                <span></span>
                                <h5 for="background-1">Light</h5>
                            </div>
                            <div class="background-2">
                                <span></span>
                                <h5 for="background-2">Dim</h5>
                            </div>
                            <div class="background-3">
                                <span></span>
                                <h5 for="background-3">Black</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="middle col-sm-6">
                <div class="feeds">
                    
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profilepicture">
                                    <img src="./images/blank-profile-picture.png" alt="yes">
                                </div>
                                <div class="searchName">
                                    <a href="#">
                                        <h3>jack Doe</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="./images/user-profile-icon-free-vector.jpg" alt="Look Like This">
                        </div>
                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-thumbs-down"></i></span>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Hello i am jack i like to run :)</p>
                        </div>
                    </div>

                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profilepicture">
                                    <img src="./images/blank-profile-picture.png" alt="yes">
                                </div>
                                <div class="searchName">
                                    <a href="#">
                                        <h3>Paul Doe</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="./images/user-profile-icon-free-vector.jpg" alt="Look Like This">
                        </div>
                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-thumbs-down"></i></span>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Hello i am paul i like to talk :)</p>
                        </div>
                    </div>

                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profilepicture">
                                    <img src="./images/blank-profile-picture.png" alt="yes">
                                </div>
                                <div class="searchName">
                                    <a href="#">
                                        <h3>Jane Doe</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="./images/user-profile-icon-free-vector.jpg" alt="Look Like This">
                        </div>
                        <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-thumbs-down"></i></span>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Hello i am jane i like to talk :)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right col-sm-2">
                <form action="feed2.php" method="POST">
                    <div class="form-group col-5" id="genderprefradio">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="filter_type"
                                id="best_match" value="BEST_MATCH">
                            <label class="form-check-label" for="best_match">Use best match filter</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="filter_type"
                                id="custom_query" value="CUSTOM_QUERY">
                            <label class="form-check-label" for="custom_query">Use custom filtering</label>
                        </div>
                    </div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Unchecked checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                    </div> -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Other
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                        <label class="form-check-label" for="flexCheckDefault">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                        <label class="form-check-label" for="flexCheckChecked">
                            Female
                        </label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Liked by me
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Those who liked me
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" unchecked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Same Interest
                        </label>
                    </div>
                    
                    </div>
                    <button href="feed.php" type="submit" name="submit" class="btn btn-primary">Apply Filter</a>
                </form>
                
            </div>
        </div>
    </main>

    

    <script src="./feed.js"></script>

</body>

</html>