<?php
require "actionlib.php";
ask(buildInputPrompt(false, "You said ".getRawInput(), ["Say anything"]), "42");