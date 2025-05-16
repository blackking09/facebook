function login() {
  const email = document.getElementById("email").value;
  const pass = document.getElementById("password").value;
  
  if (email === "" || pass === "") {
    alert("Please fill in both fields.");
  } else {
    // এখানে আপনি আপনার লগইন প্রক্রিয়া যুক্ত করতে পারেন
    window.location.href = "home.html"; // সফল হলে home.html এ নিয়ে যাবে
  }
}