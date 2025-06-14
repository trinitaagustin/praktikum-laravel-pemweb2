<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Component Library Landing Page</title>
<style>
  :root {
    --color-bg: #ffffff;
    --color-text: #374151;
    --color-text-muted: #6b7280;
    --color-primary-bg: #000000;
    --color-primary-text: #ffffff;
    --font-sans: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  }

  *, *::before, *::after {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: var(--font-sans);
    background-color: var(--color-bg);
    color: var(--color-text-muted);
    line-height: 1.6;
    font-size: 18px;
  }

  a {
    color: inherit;
    text-decoration: none;
  }
  a:hover,
  a:focus {
    text-decoration: underline;
    outline-offset: 2px;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding-left: 1rem;
    padding-right: 1rem;
  }

  header {
    position: sticky;
    top: 0;
    background: var(--color-bg);
    border-bottom: 1px solid #e5e7eb;
    z-index: 10;
  }

  nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
  }

  .logo {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--color-text);
  }

  .nav-links {
    display: flex;
    gap: 2rem;
    font-weight: 500;
    color: var(--color-text-muted);
  }

  .nav-links a {
    position: relative;
    padding: 0.25rem 0;
    font-size: 1rem;
    transition: color 0.3s ease;
  }

  .nav-links a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 0;
    height: 2px;
    background: var(--color-primary-bg);
    transition: width 0.3s ease;
    border-radius: 2px;
  }

  .nav-links a:hover,
  .nav-links a:focus {
    color: var(--color-text);
  }

  .nav-links a:hover::after,
  .nav-links a:focus::after {
    width: 100%;
  }

  main {
    padding-top: 4rem;
    padding-bottom: 5rem;
  }

  .hero {
    text-align: center;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  .hero h1 {
    font-weight: 700;
    font-size: 4rem;
    line-height: 1.1;
    color: var(--color-text);
    margin-bottom: 1rem;
  }

  .hero p {
    font-size: 1.25rem;
    color: var(--color-text-muted);
    margin-bottom: 3rem;
  }

  .btn-primary {
    background-color: var(--color-primary-bg);
    color: var(--color-primary-text);
    border: none;
    padding: 1rem 3rem;
    font-size: 1.125rem;
    font-weight: 600;
    border-radius: 0.75rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .btn-primary:hover,
  .btn-primary:focus {
    background-color: #222;
    transform: scale(1.05);
  }

  .features {
    margin-top: 4rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
  }

  .feature-card {
    background: var(--color-bg);
    padding: 2rem;
    border-radius: 0.75rem;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.05);
    color: var(--color-text);
    text-align: center;
  }

  .feature-icon {
    font-size: 3rem;
    margin-bottom: 1.25rem;
    color: var(--color-primary-bg);
  }

  .feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
  }

  .feature-desc {
    font-size: 1rem;
    color: var(--color-text-muted);
  }

  @media (max-width: 600px) {
    .hero h1 {
      font-size: 2.5rem;
    }

    .btn-primary {
      width: 100%;
      padding: 1rem 0;
    }
  }
</style>
</head>
<body>
  <header>
    <div class="container">
      <nav aria-label="Primary navigation">
        <div class="logo" tabindex="0">CompLib</div>
        <div class="nav-links">
            @guest
                <a href="{{ route('register') }}" tabindex="0">Register</a>
                <a href="{{ route('login') }}" tabindex="0">Login</a>
            @endguest
            @auth
                <a href="{{ route('profile.edit') }}" tabindex="0">Profile</a>
                <a href="{{ route('logout') }}" tabindex="0"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    {{ csrf_field() }}
                </form>
            @endauth
        </div>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero" role="banner" aria-label="Hero section">
      <h1 tabindex="0">Build Your Component Library</h1>
      <p tabindex="0">A modern, minimal, and elegant UI toolkit made for developers. Start building faster with reusable components.</p>
      <button class="btn-primary" aria-label="Get Started with component library">Get Started</button>
    </section>

    <section id="features" class="container features" aria-label="Features">
      <article class="feature-card" tabindex="0">
        <div class="feature-icon" aria-hidden="true">⚛</div>
        <h2 class="feature-title">React Based</h2>
        <p class="feature-desc">Build components seamlessly with modern React APIs and hooks.</p>
      </article>
      <article class="feature-card" tabindex="0">
        <div class="feature-icon" aria-hidden="true">🎨</div>
        <h2 class="feature-title">Customizable</h2>
        <p class="feature-desc">Easily style and customize components to fit your design system.</p>
      </article>
      <article class="feature-card" tabindex="0">
        <div class="feature-icon" aria-hidden="true">⚡</div>
        <h2 class="feature-title">Performance</h2>
        <p class="feature-desc">Lightweight and optimized for fast rendering and minimal bundle size.</p>
      </article>
    </section>
  </main>
</body>
</html>