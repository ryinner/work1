<form method="post" action="/makeorder">
    <input type="text" id="phone" name="phone" pattern="8[0-9]{10}" required placeholder="Write tel">
    <small>Format: 8**********</small>
    <input type="email" required name="adress" placeholder="Write adress" minlength="4">
    <small>Please write email adress<small>
    <input type="text" required name="name" placeholder="Write your name" minlength="3">
    <small>Please write full name<small>
    <button type="submit" class="btn btn-primary btn-thn clear-cart">Buy</button>
</form>