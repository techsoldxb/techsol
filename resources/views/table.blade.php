<form action="{{ route('order') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Place Order</button>
</form>