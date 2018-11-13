<form method="POST" action="{{ $action }}" onsubmit="return confirm('Do you really want to delete this row?')">
    {{ csrf_field() }}
    {{ isset($method) ? method_field('DELETE') : '' }}
    {{ $slot }}
    <div class="form-group">
        <input type="submit" class="btn {{ isset($buttonClasses) ? $buttonClasses : 'btn-danger' }}"
               value="Delete">
    </div>
</form>