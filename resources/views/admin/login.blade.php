<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Admin | login </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
     <!-- site icon -->
     <link href="/assets/images/logo/building.svg" rel="icon">
     <!-- bootstrap css -->
     <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
     <!-- site css -->
     <link rel="stylesheet" href="/assets/css/pricing.css" />
     <!-- responsive css -->
     <link rel="stylesheet" href="/assets/css/pricing-responsive.css" />

   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div style="display:flex;justify-content: center;align-items: center;">
                        <img width="180" src="/assets/images/layout_img/user.png" alt="#" />
                        <h2 style="color:whitesmoke;">Administrator</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="{{route('admin.login')}}" method="post">
                        @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail" value="{{ old('email','admin@gmail.com') }}" required/>
                              @error('email')
                              <div class="alert alert-danger">{{ $message }} </div>
                              @enderror
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" value="admin"  required/>
                              @error('password')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>

                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
