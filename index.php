<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Facebook Meta -->
  <meta property="fb:pages" content="100240385045148" />
  <meta property="og:url" content="http://codeshare.zakerxa.com" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Private Code Sharing" />
  <meta property="og:description" content="Share your code & content easily with our website" />
  <meta property="og:image" content="http://codeshare.zakerxa.com/assets/icon/vue.png" />
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Code Share</title>
</head>

<body>

  <div id="loading" style="height:100vh;background:#fff;">
    <!-- Show Loading if Data not ready yet -->
    <div class="row d-flex align-items-center" style="height:95vh;background:#fff;z-index:100010;position:fixed;width:100vw;">
      <div class="col-12  text-center">
        <img src="assets/icon/giphy.webp" style="width: 300px;" alt="">
      </div>
    </div>
  </div>

  <!-- App Start Place -->
  <div id="app-start">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <div class="navbar-brand fw-bold p-2"><i class="fa fa-code-branch"></i> Code.Share</div>
        <div class="navbar-toggler border-0">
          <span v-if="globalhash" class="fas fa-upload text-dark" style="font-size: 25px;" @click="goUploadPage('upload')"></span>
          <span v-else class="fas fa-home text-dark" style="font-size: 25px;" @click="goHomePage('home')"></span>

        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Nav Mid -->
          <ul class="navbar-nav m-auto">
            <li class="nav-item fw-bold" @click="goHomePage('home')">
              <a class="nav-link router active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item fw-bold" @click="goUploadPage('upload')">
              <a class="nav-link router ">Upload</a>
            </li>
          </ul>
          <!-- Nav End -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item fw-bold">
              <a class="nav-link router " href="privacy.html">Privacy</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- <div class="offcanvas offcanvas-start offcanvasBg" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
         <div class="offcanvas-header p-2 bg-light">
         <div class="navbar-brand fw-bold p-2" ><i class="fa fa-code-branch"></i> Code.Share</div>
           <button type="button" class="btn-close text-dark" style="font-size: 21px;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">

            <ul class="navbar-nav align-items-center">
               <li class="nav-item p-2 fw-bold">
                 <a class="nav-link text-light" aria-current="page" @click="goHomePage('home')" data-bs-dismiss="offcanvas">Home</a>
               </li>
               <li class="nav-item p-2 fw-bold" @click="goUploadPage('upload')" data-bs-dismiss="offcanvas">
                 <a class="nav-link text-light">Upload</a>
               </li>
              <li class="nav-item p-2 fw-bold">
                <a class="nav-link text-light " href="privacy.html" data-bs-dismiss="offcanvas">Privacy</a>
              </li>
            </ul>

         </div>
       </div> -->

    <!-- App Container Start -->
    <div class="container pb-5">

      <div v-show="homepage" class="row justify-content-center mb-5">

        <div class="row pt-3 text-center justify-content-center">
          <div class="col-9 col-lg-5">
            <img src="assets/icon/246825-200.png" :style="homelogo" class="w-50 bg-light homelogo" alt="">
          </div>
          <div class="col-12 col-lg-7 align-items-center p-0">
            <h2 class="p-4 text-warning fw-bold mt-lg-3">
              <i class="fa fa-code-branch"></i> Code.Share
            </h2>

            <p class="fw-bold text-light text-uppercase text-monospace" style="letter-spacing:0.9px">INSERT YOUR PRIVATE KEY TO GET CODE.THIS KEY WILL BE EXPIRE EVERY 24 HOURS. Try Upload . . .</p>

          </div>
        </div>

        <div class="row justify-content-center mt-5 p-3 mb-2 mb-md-5" style="background: rgba(0, 0, 0, 0.3);">
          <div class="col-9 col-lg-6 text-center">
            <div class="form-floating">
              <input v-model="privatekey" type="number" spellcheck="false" class="form-control pb-0 m-1 fw-bold text-success text-uppercase" style="letter-spacing: 3px;" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword" class="fw-bold">Insert Your Key</label>
            </div>
          </div>
          <div class="col-3 col-lg-2 text-center pr-0">
            <button @click="insertCode(privatekey)" class="btn btn-light w-100 text-dark mt-1 font-weight-bold fas fa-2x fa-arrow-alt-circle-right" style="min-height:58px;"></button>
          </div>
        </div>

        <!-- B-Modal Alert -->
        <div class="modal fade" id="showalert" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0 text-center d-block">
              <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-100 alertbox" style="border-radius:18px">
                <div class="modal-header p-1">
                  <h6 class="text-primary fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h6>
                  <button type="button" class="btn-close mb-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="pt-2">
                  <i class="fa fa-3x text-secondary fa fa-exclamation-triangle" aria-hidden="true"></i>
                </div>
                <p class="fw-bold text-secondary p-2 m-0">No Key Detect . . .</p>
                <p class="fw-bold text-monospace" style="letter-spacing: 1px;">Please insert 6 Digit Key.</p>

              </div>
            </div>
          </div>
        </div>

        <!-- B-Modal Key Expired -->
        <div class="modal fade" id="keyexpired" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0 text-center d-block">
              <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-100 alertbox" style="border-radius:18px">

                <div class="modal-header p-1">
                  <h6 class="text-primary fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h6>
                  <button type="button" class="btn-close mb-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="p-2">
                  <i class="fa fa-3x text-secondary fa fa-exclamation-triangle" aria-hidden="true"></i>
                </div>
                <p class="fw-bold text-secondary p-2 m-0">Key is Expired.</p>
                <p class="fw-bold text-monospace" style="letter-spacing: 1px;">The key that you insert is incorrect.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- B-Modal Result Box -->
        <div class="modal fade" id="resultBox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-transparent border-0 text-center d-block">
              <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-100 alertbox" style="border-radius:8px">

                <div class="modal-header p-2">
                  <h5 class="text-dark fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="">

                  <div class="selecter pb-2">
                    <div class="p-2 pb-3">
                      <textarea class="w-100 mt-2 p-2 copyboard border-0" spellcheck="false" :id="containers.PrivateKey" cols="20" rows="10" style="outline: none;border-radius:3px">{{ containers.Code }}</textarea>
                    </div>
                    <div class="">
                      <span @click="copy(containers.PrivateKey)" class="btn btn-primary fa fa-clipboard pb-2 w-75" style="cursor: pointer;"><small> Copy to clipboard</small></span>
                    </div>
                  </div>

                </div>




              </div>
            </div>
          </div>
        </div>


      </div>

      <div v-show="uploadpage" class="row justify-content-center">

        <div v-if="loginuser" class="col-12 col-lg-8 mt-5">

          <h6 class="fw-bold text-light text-left pb-3"> Please insert code that you want to share to network.</h6>
          <div class="form-floating">
            <textarea v-model="code" class="form-control" spellcheck="false" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 230px"></textarea>
            <label for="floatingTextarea2">Upload Code Here . . .</label>
          </div>

          <div class="col-12 pl-0 pr-0 text-center pt-3 pb-3 mb-5 mt-3 uploadbtn">
            <button @click="uploadcode()" class="btn btn-grad fw-bold text-light font-weight-bold w-100">Upload</button>
          </div>

          <div class="col-12 pt-4">
            <!-- User Data -->
            <div v-for="(d,index) in userdata" class="card mb-3">
              <div class="card-header row pb-0">
                <div class="col">
                  <p class="float-left d-inline-block">{{d.name}}</p>
                </div>
                <div class="col text-end">
                  {{d.date}}
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{d.otk}}</h5>

                <readmore-post :post="d.data" :index="index+'profile'"></readmore-post>

              </div>
            </div>

          </div>

          <!-- B-Modal Alert -->
          <div class="modal fade" id="add-code" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bg-transparent border-0 text-center d-block">
                <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-75 alertbox" style="border-radius:18px">
                  <div class="modal-header p-1">
                    <h6 class="text-primary fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h6>
                    <button type="button" class="btn-close mb-1" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="">
                    <i class="fa fa-3x text-secondary fa fa-check-circle" aria-hidden="true"></i>
                  </div>
                  <p class="fw-bold text-success p-2 m-0">Completed</p>
                  <p class="fw-bold text-monospace" style="letter-spacing: 1px;">Your code successfully uploaded.</p>

                </div>
              </div>
            </div>
          </div>

          <!-- B-Modal Alert -->
          <div class="modal fade" id="error-code" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bg-transparent border-0 text-center d-block">
                <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-75 alertbox" style="border-radius:18px">
                  <div class="modal-header p-1">
                    <h6 class="text-primary fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h6>
                    <button type="button" class="btn-close mb-1" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="pt-2">
                    <i class="fa fa-3x text-secondary fa fa-exclamation-triangle" aria-hidden="true"></i>
                  </div>
                  <p class="fw-bold text-secondary p-2 m-0">No data found . . .</p>
                  <p class="fw-bold text-monospace" style="letter-spacing: 1px;">There is something went wrong.</p>

                </div>
              </div>
            </div>
          </div>

        </div>

        <div v-else class="pt-4 pb-5">

          <div class="row pt-2 justify-content-center">

            <ul class="text-light fw-bold pb-4 m-0 list-unstyled">
              <li class="p-2 mt-2"><span class="text-warning">*</span> Please create temporary account to upload the data.</li>
              <li class="p-2 mt-2"><span class="text-warning">*</span> Enter username to know who you are.</li>
              <li class="p-2 mt-2"><span class="text-warning">*</span> This account will be deleted from the server every 24hours.</li>
            </ul>

            <div class="col-12 col-lg-7 mb-3 mt-5 text-center d-inline-block">
              <div class="form-floating w-100 d-inline-block">
                <input v-model="username" type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                <label for="floatingInput" class="fw-bold">Enter Username</label>
              </div>
            </div>

            <div class="col-12 col-lg-7 pb-5 text-center d-inline-block">
              <div @click="createdAcc(username)" class="btn btn-dark fw-bold w-100 p-2">Create Account <i class="fa fa-arrow-right"></i></div>
            </div>

          </div>

          <!-- B-Modal Alert -->
          <div class="modal fade" id="useralert" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bg-transparent border-0 text-center d-block">
                <div class="modal-body d-inline-block text-center p-2 shadow border-0 w-100 alertbox" style="border-radius:18px">
                  <div class="modal-header p-1">
                    <h6 class="text-primary fw-bold pt-2"><i class="fa fa-code-branch"></i> Code.Share</h6>
                    <button type="button" class="btn-close mb-1" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="pt-2">
                    <i class="fa fa-3x text-secondary fa fa-exclamation-triangle" aria-hidden="true"></i>
                  </div>
                  <p class="fw-bold text-secondary p-2 m-0">Invalid Format . . .</p>
                  <p class="fw-bold text-monospace" style="letter-spacing: 1px;">Please enter username.</p>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
    <!-- App Contaier-Fluid End -->


    <div class="container-fluid bg-light">
      <div class="row justify-content-left mt-5">
        <div class="col-12 pt-4 pb-2">
          <h4 class="fw-bold p-2"><i class="fa fa-code-branch"></i> Code.Share</h4>
        </div>
        <div class="col col-lg-4 p-3 text-left"></div>
        <div class="col col-lg-1 p-3 text-left">
          <img src="assets/icon/html.png" class="w-100" alt="">
        </div>
        <div class="col col-lg-1 p-3 text-left">
          <img src="assets/icon/vue.png" class="w-100" alt="">
        </div>
        <div class="col col-lg-1 p-3 text-left">
          <img src="assets/icon/php.png" class="w-100" alt="">
        </div>
        <div class="col col-lg-1 p-3 text-left">
          <img src="assets/icon/boot.png" class="w-100" alt="">
        </div>
        <div class="col col-lg-4 p-3 text-left"></div>

        <div class="col-12 text-end p-3 pl-4">
          <p class="text-muted">Developed by Z.M.H</p>
        </div>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- /Template  -->
  <script src="template/readmore.js"></script>



  <script type="text/javascript">
    
    function loading() {
      document.getElementById('app-start').style.display = 'none';
      document.getElementById('loading').style.display = 'block';
    }

    window.addEventListener('DOMContentLoaded', loading, false);

    $(document).ready(function() {

      setTimeout(() => {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('app-start').style.display = 'block';
      }, 800);

      new Vue({
        el: '#app-start',
        data() {
          return {
            msg: "hello",
            containers: [],
            privatekey: "",
            expire: false,
            cookiekey: this.getCookie('key'),
            cookieName: this.getCookie('name').split('+').toString().replace(/,/g, ' '),
            username: '',
            code: '',
            userdata: [],
            // router 
            homepage: true,
            uploadpage: false,
            globalhash: true,
            loginuser: false,
            // CSS
            customAnimation: 'rotateStyle .6s infinite ease',
            homelogo: {
              animation: ''
            },
          }
        },
        methods: {
          goHomePage(e) {
            this.homepage = true;
            this.globalhash = true;
            this.uploadpage = false;
            this.createBrowserHistory('');
            this.routerLinkActive(0);
          },
          goUploadPage(e) {
            this.homepage = false;
            this.globalhash = false;
            this.uploadpage = true;
            this.createBrowserHistory(e);
            this.routerLinkActive(1);
          },
          routerLinkActive(e) {
            // Router Live Active
            var btns = document.getElementsByClassName("router");
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            btns[e].className += " active";
          },
          createBrowserHistory(e) {
            window.history.pushState(null, null, '#' + e);
          },
          createdAcc(e) {
            $.ajax({
              method: "post",
              url: "adduser.php",
              data: {
                username: e
              },
              error: e => console.log(e),
              success: res => {
                console.log(res)
                if (res == "success") this.loginuser = true;
                else {
                  this.loginuser = false;
                  $('#useralert').modal('show');
                }
              }
            })
          },
          getCookie(e) {
            var name = e + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
          },
          checkUser() {
            $.ajax({
              method: "post",
              url: "includes/checkuser.php",
              data: {
                name: this.cookieName,
                pass: this.cookiekey
              },
              error: e => console.log(e),
              success: res => {
                if (res == "true") this.loginuser = true;
                else this.loginuser = false;
              }
            })
          },
          uploadcode() {
            const vm = this;
            if (this.code == "") {
              $('#error-code').modal('show');
              setTimeout(() => $('#error-code').modal('hide'), 2000);
            } else {
              console.log("else", this.code)
              $.ajax({
                type: 'post',
                url: 'includes/upload.php',
                data: {
                  code: this.code
                },
                error: (e) => console.log(e),
                success: res => {
                  if (res == 'success') {
                    $('#add-code').modal('show');
                    setTimeout(() => {
                      $('#add-code').modal('hide');
                      vm.getuserdata();
                    }, 2000);
                  } else $('#error-code').modal('show');
                }
              });
              this.code = "";
            }
          },
          getuserdata() {
            $.ajax({
              method: 'GET',
              dataType: 'JSON',
              url: 'includes/userdata.php',
              success: res => this.userdata = res,
              error: e => console.log(e)
            })
          },
          copy(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 999999);
            document.execCommand("copy");
            console.log(id)
          },
          async insertCode(e) {
            if (e == "") {
              $('#showalert').modal('show');
              setTimeout(() => $('#showalert').modal('hide'), 2000);
            } else {
              await $.ajax({
                method: "post",
                dataType: "json",
                url: "includes/code.php",
                data: {
                  code: e
                },
                beforeSend: ( )=> {
                  this.homelogo.animation = this.customAnimation;
                  this.privatekey = '';
                },
                error: e => {
                  console.log('Really',e)
                  setTimeout(() => {
                    this.homelogo.animation = '';
                    $('#keyexpired').modal('show');
                  }, 500);
                },
                success: res => {
                  if (res == "invalid") {
                    setTimeout(() => {
                      this.homelogo.animation = '';
                      $('#keyexpired').modal('show');
                    }, 500);
                  } else {
                    setTimeout(() => {
                      this.homelogo.animation = '';
                      $('#resultBox').modal('show');
                      this.containers = res;
                    }, 500);
                  }
                }
              });
            }
          }
        },
        mounted() {
          let vm = this;
          this.checkUser();

          if (this.cookiekey != '' && this.cookieName != '') {
            this.getuserdata();
          }

          // Check  History Change
          if (window.history && window.history.pushState) {

            $(window).on('popstate', e => {
              // Get Url Href & Hash
              let $hash = window.location.hash;
              let $href = window.location.href;

              if ($hash == '') {
                vm.globalhash = true;
                vm.homepage = true;
                vm.uploadpage = false;
                vm.routerLinkActive(0);
              }

              if ($hash == '#upload') {
                vm.globalhash = false;
                vm.homepage = false;
                vm.uploadpage = true;
                vm.routerLinkActive(1);
              }

            });
          }
        },
      })

    });
  </script>
</body>

</html>