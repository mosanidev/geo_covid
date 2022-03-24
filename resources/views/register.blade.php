<form action="{{ route('register') }}" method="post">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="Name">
    <input type="text" name="email" class="form-control" placeholder="Email">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <input type="submit" class="btn btn-primary btn-block" value="Register"/>
</form>