<?php include("include/header.php"); ?>

<section id="tg-info">
<div class="container">
<h2>Telegram Bot - Track & Autobook</h2>
<hr>
<h3>HOW IT WORKS?</h3>
<p>
The bot will notify you once vaccine doses are available to your desired pincode and age group which you're looking for.
The bot will send you message regarding available slots.
</p>
<h3>FEATURES?</h3>
<ul>
<li>You can login using your phone number and check beneficiaries</li>
<li>You can login using your phone number and check beneficiaries</li>
<li>You can track/untrack your pincode and age group</li>
<li>You can snooze bot messages if they're annoying</li>
<li>You can check your current tracking status</li>
<li>Once you registered for vaccine, inform to bot and it wont notify you further more</li>
<li>User friendly and linking commands with /help and other related ones.
<li>Fast and instant, tracks portal every 1 minute and informs you. so in your case snoozing would be the best option if you're tracking 45+ age group (mainly because its available and you specially want to use the bot for 18+ group, because of high competition)</li>
</ul>

<div class="container text-center">
<h3>Important:</h3>
<p class="text-center">THE BOT HAS AN INVITATION SYSTEM TO PREVENT RANDOM USERS ACCESSING</p>
<p id="invite-code">Invitation code is: <span id="icode" title="Click to copy">C0WiNbotSwapnil</span></p>
<p class="text-center">Use this code to gain access to bot and track the next vaccine status.</p>
<a class="btn btn-lg btn-primary" href="https://t.me/cowingov_bot">Click to Join</a>
</div>


<script>
    const span = document.querySelector("#icode");

    span.onclick = function() {
    document.execCommand("copy");
    }

    span.addEventListener("copy", function(event) {
    event.preventDefault();
    if (event.clipboardData) {
        event.clipboardData.setData("text/plain", span.textContent);
        alert("Invited Code Copied to Clipboard")
    }
});
</script>







</p>
</div>

</section>

<?php include("include/footer.php"); ?>