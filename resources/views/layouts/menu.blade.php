<nav class="navbar navbar-dark bg-primary">
<a class="navbar-brand" href="#">
    {{-- Navbar --}}
    
    <li class="user-header bg-primary">

        <p>
            {{ Auth::user()->name }}
            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
        </p>
    </li>
    
</a>

</nav>