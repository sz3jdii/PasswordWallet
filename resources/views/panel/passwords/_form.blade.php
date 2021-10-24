@csrf
<label for="name">
    Name *
    <br>
    <input type="text" name="name" value="{{old('name')}}" placeholder="jkowalsky facebook.com" required>
</label>
<label for="login">
    Login *
    <br>
    <input type="text" name="login" value="{{old('login')}}" placeholder="jkolwalsky" required>
</label>
<label for="password">
    Password *
    <br>
    <input type="password" name="password" placeholder="********" required>
</label>
<label for="web_address">
    Web address
    <br>
    <input type="text" name="web_address" value="{{old('web_address')}}" placeholder="facebook.com" required>
</label>
<label for="description">
    Description
    <br>
    <input type="text" name="description" value="{{old('description')}}" placeholder="This pass is for logging into facebook.com" required>
</label>
