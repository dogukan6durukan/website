<div class="main">
    <div class="about">
        <h2>About me</h2>
        <p>
            Hi, it's me. I'm Dogukan. I have been interested in programming since I was a kid.
            Now, I'm 19 years old and plan to study at university for my interest in programming.
            I'm hoping I can get into my favorite university. Meanwhile, I decided to try many programming languages
            but couldn't say I'm proficient in them. Between them, I like JavaScript itself and use it on most projects.
            Dedicated to learn the computer structure, hardware, and its components, and more.           
        </p>
    </div>
    <div id="content">
        <!--LIST BLOGS-->
        <?php
           include_once "listBlogs.php"
        ?>
    </div>
    <div class="">
        <button id="next">Next</button>
        <button id="prev">Prev</button>
        <select id="count" required>
            <option value="" selected>ALL</option>
            <option value="2" >2</option>
            <option value="3">3</option>
            <option value="5">5</option>
        </select>
    </div>
</div>