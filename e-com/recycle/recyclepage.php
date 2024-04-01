<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="recyclepage.css">
  <title>Recycle page</title>
</head>
<body>
  <header>
  <div class="navbar">
    <div class="navheading">
      <p>Schedule</p>
    </div>
    <div class="nav-logo border">
      <div class="logo"></div>
    </div>
  </div>
</header>
<p class="dis">Tell us what your giving...</p>

<div class="label-cont">
    <div class="label1">
      <label for="wasteCategory">Select Category:</label>
    </div>

    <div class="label2">
      <label for="wasteWeight">Enter Weight (in kilograms):</label>
    </div>
</div>

<div class="form1">

  <form onsubmit="confirmPickup(event)">
        <div id="wasteInputs">
            <div class="waste-input-container">
                
                <select class="waste-category" required>
                    <option value="Plastics">Plastics</option>
                    <option value="Wood">Wood</option>
                    <option value="Metal">Metal</option>
                    <option value="Fabric">Fabric</option>
                    <option value="Glass">Glass</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Paper/cardboard">Paper/cardboard</option>
                </select>

                
                <input type="number" class="waste-weight" required>

                <button class="remove-waste-btn" onclick="removeWasteInput(this)">Remove</button>
            </div>
        </div>

        <button type="button" onclick="addMoreWaste()">+ Add more</button>

        <br>

        <label for="pickupDateTime">Select Pickup Date and Time:</label>
        <input type="datetime-local" id="pickupDateTime" required>

        <br>

        <button type="submit">Confirm Pickup</button>
    </form>

    <script>
        function confirmPickup(event) {
            event.preventDefault();

            var wasteInputs = document.querySelectorAll('.waste-input-container');

            wasteInputs.forEach(function (wasteInput) {
                var wasteCategory = wasteInput.querySelector('.waste-category').value;
                var wasteWeight = parseFloat(wasteInput.querySelector('.waste-weight').value);

                if (isNaN(wasteWeight) || wasteWeight <= 0) {
                    alert("Please enter a valid waste weight.");
                    return;
                }

                console.log("Waste Category: " + wasteCategory);
                console.log("Waste Weight: " + wasteWeight + " kg");
            });

            var pickupDateTime = document.getElementById('pickupDateTime').value;

            console.log("Pickup Date and Time: " + pickupDateTime);

            alert("Pickup confirmed!");
        }

        function addMoreWaste() {
            var wasteInputs = document.getElementById('wasteInputs');

            var newWasteInput = document.createElement('div');
            newWasteInput.classList.add('waste-input-container');

            newWasteInput.innerHTML = `
                
                <select class="waste-category" required>
                    <option value="Plastics">Plastics</option>
                    <option value="Wood">Wood</option>
                    <option value="Metal">Metal</option>
                    <option value="Fabric">Fabric</option>
                    <option value="Glass">Glass</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Paper/cardboard">Paper/cardboard</option>
                </select>

                
                <input type="number" class="waste-weight" required>

                <button class="remove-waste-btn" onclick="removeWasteInput(this)">Remove</button>
            `;

            wasteInputs.appendChild(newWasteInput);
        }

        function removeWasteInput(element) {
            var wasteInputs = document.getElementById('wasteInputs');
            var wasteInputContainer = element.parentNode;
            wasteInputs.removeChild(wasteInputContainer);
        }
    </script>
  <!-- <form>
    <p class="form-head">Categories</p>
    <input type="text" >
    <input type="text" >
    <input type="text" >
    <input type="text" >
  </form>
  <form>
    <p class="form-head">Weight</p>
    <input type="text" class="in" >
    <input type="text" class="in">
    <input type="text" class="in">
    <input type="text" class="in">
  </form>
  <form>
  <p class="form-head">Select pickup data</p>
  <input type="date" id="eventDate" name="eventDate">
  <br>
  <p class="form-head">Time</p>
  <input type="time" id="eventTime" name="eventTime">
  </form>
</div>
<input type="submit" value="Submit" class="submit"> -->
<div class="copyright">
  <p class="copy">© Trinity. All rights reserved.</p>
</div>
</body>
</html>