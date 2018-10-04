<div class="wrapper">
  <footer style="background: #321A1F; color: #fff;">
    <table style="margin-left: 100px;" class="table table-hover">
      <tr>
        <td >
          Helpline: <br>
          @foreach(\App\Models\About::all() as $helpline)
          {{ $helpline->branch->name }}: {{ $helpline->helpline }} <br>
          @endforeach
        </td>
        <td>
          Ambulance: <br>
          @foreach(\App\Models\About::all() as $ambulance)
          {{ $ambulance->branch->name }}: {{ $ambulance->ambulance_no }} <br>
          @endforeach
        </td>
        <td>
          Branch Contact: <br>
          @foreach(\App\Models\About::all() as $about)
          {{ $about->branch->name }} : {{ $about->emergency }} <br>
          @endforeach
         
        </td>
      </tr>
      <tr >
        <td> Find us at </td>
        <td><a href="https://facebook.com" target="_blank"><img src="{{ asset('public/images/fb.png') }}" height="50px"; width="50px";>
        </a> &nbsp; &nbsp; &nbsp; <a href="#"><img src="{{ asset('public/images/gmail.png') }}" height="50px"; width="50px";> &nbsp; &nbsp; &nbsp;
          <a href="#"><img src="{{ asset('public/images/twitter.png') }}" height="50px"; width="50px";>

          </td>
        </tr>
      </table>
    </footer>
  </div>
