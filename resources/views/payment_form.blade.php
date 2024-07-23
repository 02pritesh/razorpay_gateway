<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Razorpay Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <h1>Make Payment</h1>
      <div class="row mt-5">
        <form action="{{url('make-order')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Amount</label>
            <input type="text" class="form-control"  placeholder="Enter amount" name="amount">
            @error('amount')
                <span style="color: red">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Make Payment</button>
          </div>
          
        </form>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>