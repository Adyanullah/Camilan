<style>
nav {
    width: 80%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100px;
}
nav ul {
    list-style: none;
    display: flex;
    padding-left: 20px;
    gap: 20px;
    margin: 0;
}

nav a {
    text-decoration: none;
    color: whitesmoke;
    font-size: 18px;
    transition: color 0.5s;
    padding: 10px 20px;
}

nav a:hover {
    color: whitesmoke;
    border-bottom: 4px solid whitesmoke;
    transition: 0.2s;
}
.logo {
    margin-right: 40px;
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
    font-size: 24px;
    color: whitesmoke;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.navbar {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    top: 0;
    position: sticky;
    background-color: #000000;
}


</style>
<div class="navbar">
<nav>
        <div>
            <ul>
                <li><a href="#beranda">Sign In</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a>Menu</a></li>
                <li><a>Contact</a></li>
                <li><a>About Us</a></li>
            </ul>
        </div>
        <div class="logo" id="balik">
            <h4>Logo</h4>
        </div>
</nav>
</div>  