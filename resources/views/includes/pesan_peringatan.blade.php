<!DOCTYPE html>
<html>
  <style>
    .pesan-peringatan {
      width: 50%;
      margin-left: 25%;
      padding: 20px;
      color: white;
      margin-bottom: 15px;
      border-radius: 5px;
      text-align: center;
      justify-content: center;
      text-shadow: 1px 1px 10px black;
      position: fixed;
      z-index: 9999;
      animation: muncul 1.5s ease forwards;
      opacity: 0;
    }

    .silang {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .silang:hover {
      color: black;
    }

    @keyframes muncul {
      0% {
        opacity: 0;
        transform: translateY(-100%);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
    <!-- ini adalah notifikasi / pesan di dalam box -->

    <!-- <div class="pesan-peringatan" style="background-color: red">
      <span class="silang" onclick="this.parentElement.style.display='none';"
        >&times;</span>
      <strong>Peringatan!</strong> Ini adalah pesan peringatan.
    </div>
 -->
 @if(session('success'))
 <div class="pesan-peringatan" style="background-color: #008e37;">
     <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
     <strong>Selamat!</strong> {{ session('success') }}
 </div>
 @endif

 @if(session('error'))
 <div class="pesan-peringatan" style="background-color: red;">
     <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
     <strong>Peringatan!</strong> {{ session('error') }}
 </div>
 @endif


</html>
