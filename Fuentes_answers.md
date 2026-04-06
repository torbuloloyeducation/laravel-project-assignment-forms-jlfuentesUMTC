<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

# Activity Submission: Laravel Basics
**Student Name:** Fuentes, Shen JL Bleselle

---

## 📝 Activity 2: Forms in Laravel

### Task 1: Understand the Flow
It works like a loop: you type an email into the box and hit submit. The website stores that email in the browser’s Session storage (a temporary memory space). Then the page reloads. On reload, the site checks the Session storage, retrieves all the emails you’ve saved so far, and displays them together on the screen.

---

## Reflection Questions

Answer the following:

1. What is the difference between GET and POST?
2. Why do we use `@csrf` in forms?
3. What is session used for in this activity?
4. What happens if session is cleared?

## Answers:

1. GET vs. POST  
GET like a postcard—anyone can read the message because the data is visible in the URL. 
POST is more like a sealed envelope—it keeps the contents private and is used when you’re actually sending or changing data.

2. CSRF Token  
It’s like a security badge. It proves that the form submission really comes from your site, not from a hacker trying to hijack the session.

3. Session Storage  
It temporarily remembers the emails while you click around, but it’s not permanent like a database.

4. Session Clearing  
If the session is cleared, that “brain” is wiped clean. All the saved emails disappear, and the list goes back to empty.
