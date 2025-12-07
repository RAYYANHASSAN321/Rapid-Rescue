<?php

include 'navbar.php'; 
include "registration_system/connection.php";

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has a valid user ID
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('You need to log in first.'); window.location.href='registration_system/login_register.php';</script>";
    exit;
}

$user_id = $_SESSION['userid']; // Fetch the logged-in user's ID from session

// Fetch user's medical profile
$query = "SELECT * FROM medicalprofiles WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$medical_profile = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Medical Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        background-color: #e9ecef; /* Slightly darker background for contrast */
        font-family: Arial, sans-serif;
    }

    .medical {
        width: 90%;
        max-width: 800px;
        margin: 150px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
        font-size: 2.5rem;
    }

    .message {
        color: #b71c1c; /* Enhanced red color for messages */
        font-size: 18px;
        margin: 20px 0;
        text-align: center;
    }

    .profile-form label {
        font-weight: bold;
        color: #b71c1c; /* Color for labels */
    }

    .profile-form input, 
    .profile-form select, 
    .profile-form textarea {
        width: 100%;
        padding: 12px;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 2px solid #b71c1c; /* Red border */
        transition: border-color 0.3s;
    }

    .profile-form input:focus,
    .profile-form select:focus,
    .profile-form textarea:focus {
        border-color: #900c0c; /* Darker red on focus */
        outline: none;
    }

    .profile-form button {
        padding: 12px 20px;
        background-color: #b71c1c; /* Button color */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .profile-form button:hover {
        background-color: #900c0c; /* Darker red on hover */
        transform: scale(1.05); /* Slight scale effect */
    }

    .profile-data {
        margin-top: 20px;
        border: 2px solid #dee2e6; /* Thicker border */
        padding: 20px;
        border-radius: 5px;
        background-color: #f8f9fa;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-data p {
        margin: 10px 0;
        font-size: 1.1rem; /* Increased font size for better readability */
    }

    a.edit-link {
        display: inline-block;
        margin-top: 10px;
        color: #b71c1c; /* Link color matching the theme */
        text-decoration: none;
        font-weight: bold;
    }

    a.edit-link:hover {
        text-decoration: underline;
        color: #900c0c; /* Darker red on hover */
    }
</style>
</head>
<body>

<div class="container medical">
    <h2>Medical Profile</h2>

    <?php if ($medical_profile): ?>
        <!-- If medical profile exists, show the data -->
        <div class="profile-data">
            <h4>Your Medical Profile:</h4>
            <p><strong>Medical History:</strong> <?php echo $medical_profile['medical_history']; ?></p>
            <p><strong>Allergies:</strong> <?php echo $medical_profile['allergies']; ?></p>
            <p><strong>Emergency Contact Phone:</strong> <?php echo $medical_profile['emergency_contact_phone']; ?></p>
        </div>

        <a class="edit-link" href="medicalprofileedit.php">Edit Medical Profile</a>

    <?php else: ?>

        <form method="POST" class="profile-form">
            
            <label for="medical_history">Medical History:</label>
            
            <select name="medical_history" id="medical_history" required>
                <option hidden>Your Medical History</option>
                <option class="text-black fs-6" value="Hypertension">Hypertension</option>
<option class="text-black fs-6" value="Diabetes">Diabetes</option>
<option class="text-black fs-6" value="Asthma">Asthma</option>
<option class="text-black fs-6" value="Heart Disease">Heart Disease</option>
<option class="text-black fs-6" value="Stroke">Stroke</option>
<option class="text-black fs-6" value="Arthritis">Arthritis</option>
<option class="text-black fs-6" value="Cancer">Cancer</option>
<option class="text-black fs-6" value="Chronic Kidney Disease">Chronic Kidney Disease</option>
<option class="text-black fs-6" value="Liver Disease">Liver Disease</option>
<option class="text-black fs-6" value="Thyroid Disorders">Thyroid Disorders</option>
<option class="text-black fs-6" value="Epilepsy">Epilepsy</option>
<option class="text-black fs-6" value="COPD">COPD</option>
<option class="text-black fs-6" value="Anemia">Anemia</option>
<option class="text-black fs-6" value="Depression">Depression</option>
<option class="text-black fs-6" value="Anxiety Disorders">Anxiety Disorders</option>
<option class="text-black fs-6" value="Tuberculosis">Tuberculosis</option>
<option class="text-black fs-6" value="Hepatitis">Hepatitis</option>
<option class="text-black fs-6" value="Multiple Sclerosis">Multiple Sclerosis</option>
<option class="text-black fs-6" value="Alzheimer’s Disease">Alzheimer’s Disease</option>
<option class="text-black fs-6" value="Parkinson’s Disease">Parkinson’s Disease</option>
<option class="text-black fs-6" value="Gout">Gout</option>
<option class="text-black fs-6" value="Osteoporosis">Osteoporosis</option>
<option class="text-black fs-6" value="Sleep Apnea">Sleep Apnea</option>
<option class="text-black fs-6" value="Acid Reflux">Acid Reflux</option>
<option class="text-black fs-6" value="Psoriasis">Psoriasis</option>
<option class="text-black fs-6" value="Eczema">Eczema</option>
<option class="text-black fs-6" value="Ulcerative Colitis">Ulcerative Colitis</option>
<option class="text-black fs-6" value="Crohn’s Disease">Crohn’s Disease</option>
<option class="text-black fs-6" value="Celiac Disease">Celiac Disease</option>
<option class="text-black fs-6" value="Sickle Cell Disease">Sickle Cell Disease</option>
<option class="text-black fs-6" value="Hemophilia">Hemophilia</option>
<option class="text-black fs-6" value="Varicose Veins">Varicose Veins</option>
<option class="text-black fs-6" value="Atrial Fibrillation">Atrial Fibrillation</option>
<option class="text-black fs-6" value="Peripheral Artery Disease">Peripheral Artery Disease</option>
<option class="text-black fs-6" value="Glaucoma">Glaucoma</option>
<option class="text-black fs-6" value="Cataracts">Cataracts</option>
<option class="text-black fs-6" value="Macular Degeneration">Macular Degeneration</option>
<option class="text-black fs-6" value="Kidney Stones">Kidney Stones</option>
<option class="text-black fs-6" value="Gallbladder Disease">Gallbladder Disease</option>
<option class="text-black fs-6" value="Prostate Problems">Prostate Problems</option>
<option class="text-black fs-6" value="Endometriosis">Endometriosis</option>
<option class="text-black fs-6" value="Fibroids">Fibroids</option>
<option class="text-black fs-6" value="Polycystic Ovary Syndrome (PCOS)">Polycystic Ovary Syndrome (PCOS)</option>
<option class="text-black fs-6" value="Menopause Symptoms">Menopause Symptoms</option>
<option class="text-black fs-6" value="Sexual Dysfunction">Sexual Dysfunction</option>
<option class="text-black fs-6" value="Migraines">Migraines</option>
<option class="text-black fs-6" value="Chronic Fatigue Syndrome">Chronic Fatigue Syndrome</option>
<option class="text-black fs-6" value="Fibromyalgia">Fibromyalgia</option>
<option class="text-black fs-6" value="Restless Leg Syndrome">Restless Leg Syndrome</option>
<option class="text-black fs-6" value="Shingles">Shingles</option>
<option class="text-black fs-6" value="MRSA Infection">MRSA Infection</option>
<option class="text-black fs-6" value="Infectious Mononucleosis">Infectious Mononucleosis</option>
<option class="text-black fs-6" value="Lyme Disease">Lyme Disease</option>
<option class="text-black fs-6" value="Pneumonia">Pneumonia</option>
<option class="text-black fs-6" value="Bronchitis">Bronchitis</option>
<option class="text-black fs-6" value="Sinusitis">Sinusitis</option>
<option class="text-black fs-6" value="Allergic Rhinitis">Allergic Rhinitis</option>
<option class="text-black fs-6" value="Allergies (general)">Allergies (general)</option>
<option class="text-black fs-6" value="Drug Reactions">Drug Reactions</option>
<option class="text-black fs-6" value="Skin Cancer">Skin Cancer</option>
<option class="text-black fs-6" value="Basal Cell Carcinoma">Basal Cell Carcinoma</option>
<option class="text-black fs-6" value="Squamous Cell Carcinoma">Squamous Cell Carcinoma</option>
<option class="text-black fs-6" value="Melanoma">Melanoma</option>
<option class="text-black fs-6" value="Aneurysm">Aneurysm</option>
<option class="text-black fs-6" value="Heart Attack">Heart Attack</option>
<option class="text-black fs-6" value="Stroke (Cerebrovascular Accident)">Stroke (Cerebrovascular Accident)</option>
<option class="text-black fs-6" value="Carpal Tunnel Syndrome">Carpal Tunnel Syndrome</option>
<option class="text-black fs-6" value="Tennis Elbow">Tennis Elbow</option>
<option class="text-black fs-6" value="Plantar Fasciitis">Plantar Fasciitis</option>
<option class="text-black fs-6" value="Bursitis">Bursitis</option>
<option class="text-black fs-6" value="Sciatica">Sciatica</option>
<option class="text-black fs-6" value="Herniated Disc">Herniated Disc</option>
<option class="text-black fs-6" value="Spondylosis">Spondylosis</option>
<option class="text-black fs-6" value="Tinnitus">Tinnitus</option>
<option class="text-black fs-6" value="Hearing Loss">Hearing Loss</option>
<option class="text-black fs-6" value="Speech Disorders">Speech Disorders</option>
<option class="text-black fs-6" value="Chronic Pain">Chronic Pain</option>
<option class="text-black fs-6" value="Anorexia Nervosa">Anorexia Nervosa</option>
<option class="text-black fs-6" value="Bulimia Nervosa">Bulimia Nervosa</option>
<option class="text-black fs-6" value="Binge Eating Disorder">Binge Eating Disorder</option>
<option class="text-black fs-6" value="Substance Abuse">Substance Abuse</option>
<option class="text-black fs-6" value="Post-Traumatic Stress Disorder (PTSD)">Post-Traumatic Stress Disorder (PTSD)</option>
<option class="text-black fs-6" value="Obsessive-Compulsive Disorder (OCD)">Obsessive-Compulsive Disorder (OCD)</option>
<option class="text-black fs-6" value="Bipolar Disorder">Bipolar Disorder</option>
<option class="text-black fs-6" value="Schizophrenia">Schizophrenia</option>
<option class="text-black fs-6" value="Autism Spectrum Disorder">Autism Spectrum Disorder</option>
<option class="text-black fs-6" value="Attention Deficit Hyperactivity Disorder (ADHD)">Attention Deficit Hyperactivity Disorder (ADHD)</option>
<option class="text-black fs-6" value="Learning Disabilities">Learning Disabilities</option>
<option class="text-black fs-6" value="Conduct Disorder">Conduct Disorder</option>
<option class="text-black fs-6" value="Oppositional Defiant Disorder">Oppositional Defiant Disorder</option>
<option class="text-black fs-6" value="Social Anxiety Disorder">Social Anxiety Disorder</option>
<option class="text-black fs-6" value="Seasonal Affective Disorder">Seasonal Affective Disorder</option>
<option class="text-black fs-6" value="Personality Disorders">Personality Disorders</option>
<option class="text-black fs-6" value="Delirium">Delirium</option>
<option class="text-black fs-6" value="Dementia">Dementia</option>
<option class="text-black fs-6" value="Chronic Migraines">Chronic Migraines</option>
<option class="text-black fs-6" value="Acute Stress Disorder">Acute Stress Disorder</option>
<option class="text-black fs-6" value="Phobias">Phobias</option>
<option class="text-black fs-6" value="Somatic Symptom Disorder">Somatic Symptom Disorder</option>
<option class="text-black fs-6" value="Conversion Disorder">Conversion Disorder</option>

            </select>
            

            <label for="allergies">Allergies:</label>
            <select name="allergies" id="allergies" required>
                <option hidden>Your Allergies</option>
                <option class="text-black fs-6" value="Pollen">Pollen</option>
<option class="text-black fs-6" value="Dust Mites">Dust Mites</option>
<option class="text-black fs-6" value="Mold">Mold</option>
<option class="text-black fs-6" value="Pet Dander">Pet Dander</option>
<option class="text-black fs-6" value="Latex">Latex</option>
<option class="text-black fs-6" value="Penicillin">Penicillin</option>
<option class="text-black fs-6" value="Sulfa Drugs">Sulfa Drugs</option>
<option class="text-black fs-6" value="Aspirin">Aspirin</option>
<option class="text-black fs-6" value="Ibuprofen">Ibuprofen</option>
<option class="text-black fs-6" value="Seafood">Seafood</option>
<option class="text-black fs-6" value="Peanuts">Peanuts</option>
<option class="text-black fs-6" value="Tree Nuts">Tree Nuts</option>
<option class="text-black fs-6" value="Milk">Milk</option>
<option class="text-black fs-6" value="Eggs">Eggs</option>
<option class="text-black fs-6" value="Soy">Soy</option>
<option class="text-black fs-6" value="Wheat">Wheat</option>
<option class="text-black fs-6" value="Sesame">Sesame</option>
<option class="text-black fs-6" value="Mustard">Mustard</option>
<option class="text-black fs-6" value="Garlic">Garlic</option>
<option class="text-black fs-6" value="Onion">Onion</option>
<option class="text-black fs-6" value="Strawberries">Strawberries</option>
<option class="text-black fs-6" value="Bananas">Bananas</option>
<option class="text-black fs-6" value="Kiwi">Kiwi</option>
<option class="text-black fs-6" value="Avocado">Avocado</option>
<option class="text-black fs-6" value="Celery">Celery</option>
<option class="text-black fs-6" value="Carrots">Carrots</option>
<option class="text-black fs-6" value="Corn">Corn</option>
<option class="text-black fs-6" value="Coconut">Coconut</option>
<option class="text-black fs-6" value="Beef">Beef</option>
<option class="text-black fs-6" value="Chicken">Chicken</option>
<option class="text-black fs-6" value="Lamb">Lamb</option>
<option class="text-black fs-6" value="Pork">Pork</option>
<option class="text-black fs-6" value="Chocolate">Chocolate</option>
<option class="text-black fs-6" value="Caffeine">Caffeine</option>
<option class="text-black fs-6" value="Spices">Spices</option>
<option class="text-black fs-6" value="Red Dye">Red Dye</option>
<option class="text-black fs-6" value="Yellow Dye">Yellow Dye</option>
<option class="text-black fs-6" value="Berries">Berries</option>
<option class="text-black fs-6" value="Fish">Fish</option>
<option class="text-black fs-6" value="Crustaceans">Crustaceans</option>
<option class="text-black fs-6" value="Insect Stings (Bees, Wasps)">Insect Stings (Bees, Wasps)</option>
<option class="text-black fs-6" value="Poison Ivy">Poison Ivy</option>
<option class="text-black fs-6" value="Nickel">Nickel</option>
<option class="text-black fs-6" value="Fragrances">Fragrances</option>
<option class="text-black fs-6" value="Preservatives">Preservatives</option>
<option class="text-black fs-6" value="Artificial Sweeteners">Artificial Sweeteners</option>
<option class="text-black fs-6" value="Gluten">Gluten</option>
<option class="text-black fs-6" value="Garlic">Garlic</option>
<option class="text-black fs-6" value="Cherries">Cherries</option>
<option class="text-black fs-6" value="Grapes">Grapes</option>
<option class="text-black fs-6" value="Tomatoes">Tomatoes</option>
<option class="text-black fs-6" value="Zucchini">Zucchini</option>
<option class="text-black fs-6" value="Cucumber">Cucumber</option>
<option class="text-black fs-6" value="Bell Peppers">Bell Peppers</option>
<option class="text-black fs-6" value="Spinach">Spinach</option>
<option class="text-black fs-6" value="Broccoli">Broccoli</option>
<option class="text-black fs-6" value="Cauliflower">Cauliflower</option>
<option class="text-black fs-6" value="Brussel Sprouts">Brussel Sprouts</option>
<option class="text-black fs-6" value="Green Beans">Green Beans</option>
<option class="text-black fs-6" value="Peas">Peas</option>
<option class="text-black fs-6" value="Squash">Squash</option>
<option class="text-black fs-6" value="Radishes">Radishes</option>
<option class="text-black fs-6" value="Mushrooms">Mushrooms</option>
<option class="text-black fs-6" value="Artichokes">Artichokes</option>
<option class="text-black fs-6" value="Leeks">Leeks</option>
<option class="text-black fs-6" value="Figs">Figs</option>
<option class="text-black fs-6" value="Papaya">Papaya</option>
<option class="text-black fs-6" value="Passionfruit">Passionfruit</option>
<option class="text-black fs-6" value="Dates">Dates</option>
<option class="text-black fs-6" value="Melons">Melons</option>
<option class="text-black fs-6" value="Oranges">Oranges</option>
<option class="text-black fs-6" value="Lemons">Lemons</option>
<option class="text-black fs-6" value="Limes">Limes</option>
<option class="text-black fs-6" value="Grapefruit">Grapefruit</option>
<option class="text-black fs-6" value="Persimmons">Persimmons</option>
<option class="text-black fs-6" value="Elderberries">Elderberries</option>
<option class="text-black fs-6" value="Mulberries">Mulberries</option>
<option class="text-black fs-6" value="Pawpaw">Pawpaw</option>
<option class="text-black fs-6" value="Nettle">Nettle</option>
<option class="text-black fs-6" value="Chamomile">Chamomile</option>
<option class="text-black fs-6" value="Dandelion">Dandelion</option>
<option class="text-black fs-6" value="Yarrow">Yarrow</option>
<option class="text-black fs-6" value="Echinacea">Echinacea</option>
<option class="text-black fs-6" value="Valerian">Valerian</option>
<option class="text-black fs-6" value="St. John’s Wort">St. John’s Wort</option>
<option class="text-black fs-6" value="Horse Chestnut">Horse Chestnut</option>
<option class="text-black fs-6" value="Birch Pollen">Birch Pollen</option>
<option class="text-black fs-6" value="Ragweed">Ragweed</option>
<option class="text-black fs-6" value="Cat Dander">Cat Dander</option>
<option class="text-black fs-6" value="Dog Dander">Dog Dander</option>
<option class="text-black fs-6" value="Rodent Dander">Rodent Dander</option>
<option class="text-black fs-6" value="Cockroach Droppings">Cockroach Droppings</option>
<option class="text-black fs-6" value="Tree Pollen">Tree Pollen</option>
<option class="text-black fs-6" value="Grass Pollen">Grass Pollen</option>
<option class="text-black fs-6" value="Fungal Spores">Fungal Spores</option>
<option class="text-black fs-6" value="Airborne Chemicals">Airborne Chemicals</option>
<option class="text-black fs-6" value="Heavy Metals">Heavy Metals</option>
<option class="text-black fs-6" value="Mold Spores">Mold Spores</option>
<option class="text-black fs-6" value="Sulfites">Sulfites</option>
<option class="text-black fs-6" value="Phenols">Phenols</option>

            </select>


            <label for="emergency_contact_phone">Emergency Contact Phone:</label>
            <input type="number" name="emergency_contact_phone" id="emergency_contact_phone" required>

            <button type="submit" name="save_profile">Save Profile</button>
        </form>

    <?php endif; ?>
</div>

<?php
// Handle form submission and save medical profile
if (isset($_POST['save_profile'])) {
    $medical_history = $_POST['medical_history'];
    $allergies = $_POST['allergies'];
    $emergency_contact_phone = $_POST['emergency_contact_phone'];

    // Insert into the medicalprofiles table
    $query = "INSERT INTO medicalprofiles (user_id, medical_history, allergies, emergency_contact_phone)
              VALUES ('$user_id', '$medical_history', '$allergies', '$emergency_contact_phone')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Medical profile saved successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error saving profile: " . mysqli_error($con) . "');</script>";
    }
}
?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include "footer.php"; ?>


</body>
</html>
