<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>@yield('title')</title>

   <style>
      * {
         box-sizing: border-box;
         padding: 0;
         margin: 0;
         text-decoration: none;
      }
      body {
         background-color: #202020;
         color: white;
         font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
         font-size: 16px;
         overflow-x: hidden;
      }
      input {
         background-color: rgb(254,254,254,.05);
         font-size: 20px;
         border-radius: 10px;
         padding: 10px 10px;
         margin: 4px 0;
         border: none;
         color: white;
         transition: all .3s linear;
         outline: none;
      }
      input:hover, input:focus {
         background-color: rgb(254,254,254,.15);
      }
      .page {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         width: 100%;
         padding: 10px 5%;
         margin: 2% 0;
      }
      form {
         display: flex;
         justify-content: center;
         align-content: inherit;
         flex-direction: column;
         max-width: 500px;
         width: 100%;
         padding: 3%;
         margin-top: 5%;
         background-color: rgb(254,254,254,.04);
         border-radius: 10px;
         row-gap: 6px;
         box-shadow: 
         4px 4px 10px  lightgreen,
         -4px -4px 10px white ;
      }
      a {
         color: white;
         font-weight: 900;
         transition: all .3s linear;
      }
      a:hover {
         color: lightgreen
      }
      button, .btn {
         background-color: rgb(254,254,254,.05);
         font-size: 20px;
         border-radius: 10px;
         padding: 10px 10px;
         margin: 4px 0;
         border: none;
         color: white;
         transition: all .3s linear;
         outline: none;
      }
      button:hover, .btn:hover {
         background-color: lightgreen;
         color: black;
         cursor: pointer;
         box-shadow: 0 0 1px 1px black;
      }
      h2 {
         font-size: 28px;
      }
      .message {
         color: lightgreen;
         font-size: 20px;
         margin: 4px 0;
      }
      .page__header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         width: 100%;
      }
      .page__header h1 span {
         padding: 4px 6px;
         background-color: rgb(254,254,254,.2);
         border-radius: 10px
      }
      .page__modules {
      display: flex;
      justify-content: start;
      align-items: center;
      flex-wrap: wrap;
      width: 100%;
      margin-top: 10px;
   }
.page__module {
   padding: 15px;
   background-color: rgb(254,254,254,.1);
   border-radius: 10px;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-direction: column;
   transition: all .3s linear;
   gap: 10px;
   margin: 6px;
   max-width: 300px;
   width: 100%;
}
.page__module h3 {
   font-size: 24px;
   margin-bottom: 10px;
}
.page__module__buttons {
   display: flex;
   justify-content: space-between;
   align-items: center;
   width: 100%;
   gap: 10px
}
.page__module:hover {
   background-color: black;
}
   </style>
</head>
<body>
   @include('components.header')
   @yield('content')
</body>
</html>