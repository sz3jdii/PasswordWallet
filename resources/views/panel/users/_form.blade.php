@csrf
<label for="confirmation">
    New password *
    <br>
    <input type="password" name="password" value="{{old('password')}}" placeholder="********" required>
</label>
<label for="password_confirmation">
    Repeat new password *
    <br>
    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="*********" required>
</label>
