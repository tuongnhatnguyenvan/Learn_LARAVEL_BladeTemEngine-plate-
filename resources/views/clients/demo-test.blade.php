<h2>
    Demo View Codde
</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{ session('mess') }}
    </div>
@endif
<form action="" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter Name" value="{{ old('username') }}">
    <button type="submit">Submit</button>
</form>