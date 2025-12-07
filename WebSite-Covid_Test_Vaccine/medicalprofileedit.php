<?php
include 'navbar.php'; 
include "registration_system/connection.php";

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('You need to log in first.'); window.location.href='registration_system/login_register.php';</script>";
    exit;
}

$user_id = $_SESSION['userid']; // Fetch the logged-in user's ID from session

// Fetch user's medical profile
$query = "SELECT * FROM medicalprofiles WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$medical_profile = mysqli_fetch_assoc($result);

// Update the medical profile if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medical_history = $_POST['medical_history'];
    $allergies = $_POST['allergies'];
    $emergency_contact_phone = $_POST['emergency_contact_phone'];

    $update_query = "UPDATE medicalprofiles SET 
        medical_history = '$medical_history', 
        allergies = '$allergies', 
        emergency_contact_phone = '$emergency_contact_phone' 
        WHERE user_id = '$user_id'";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Your Medical Profile updated successfully!'); window.location.href='medicalprofile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Medical Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
        .profile-form label {
            font-weight: bold;
            color: #b71c1c;
        }
        .profile-form input,
        .profile-form select,
        .profile-form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 2px solid #b71c1c;
            transition: border-color 0.3s;
        }
        .profile-form input:focus,
        .profile-form select:focus,
        .profile-form textarea:focus {
            border-color: #900c0c;
            outline: none;
        }
        .profile-form button {
            padding: 12px 20px;
            background-color: #b71c1c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .profile-form button:hover {
            background-color: #900c0c;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container medical">
    <h2>Edit Medical Profile</h2>

    <form method="POST" class="profile-form">
        <label for="medical_history">Medical History:</label>
        <select name="medical_history" id="medical_history" required>
            <option value="Hypertension" <?php echo ($medical_profile['medical_history'] == 'Hypertension') ? 'selected' : ''; ?>>Hypertension</option>
    <option value="Diabetes" <?php echo ($medical_profile['medical_history'] == 'Diabetes') ? 'selected' : ''; ?>>Diabetes</option>
    <option value="Heart Disease" <?php echo ($medical_profile['medical_history'] == 'Heart Disease') ? 'selected' : ''; ?>>Heart Disease</option>
    <option value="Asthma" <?php echo ($medical_profile['medical_history'] == 'Asthma') ? 'selected' : ''; ?>>Asthma</option>
    <option value="Arthritis" <?php echo ($medical_profile['medical_history'] == 'Arthritis') ? 'selected' : ''; ?>>Arthritis</option>
    <option value="Cancer" <?php echo ($medical_profile['medical_history'] == 'Cancer') ? 'selected' : ''; ?>>Cancer</option>
    <option value="Chronic Kidney Disease" <?php echo ($medical_profile['medical_history'] == 'Chronic Kidney Disease') ? 'selected' : ''; ?>>Chronic Kidney Disease</option>
    <option value="Chronic Obstructive Pulmonary Disease (COPD)" <?php echo ($medical_profile['medical_history'] == 'Chronic Obstructive Pulmonary Disease (COPD)') ? 'selected' : ''; ?>>Chronic Obstructive Pulmonary Disease (COPD)</option>
    <option value="Epilepsy" <?php echo ($medical_profile['medical_history'] == 'Epilepsy') ? 'selected' : ''; ?>>Epilepsy</option>
    <option value="Gastroesophageal Reflux Disease (GERD)" <?php echo ($medical_profile['medical_history'] == 'Gastroesophageal Reflux Disease (GERD)') ? 'selected' : ''; ?>>Gastroesophageal Reflux Disease (GERD)</option>
    <option value="Heart Attack" <?php echo ($medical_profile['medical_history'] == 'Heart Attack') ? 'selected' : ''; ?>>Heart Attack</option>
    <option value="High Cholesterol" <?php echo ($medical_profile['medical_history'] == 'High Cholesterol') ? 'selected' : ''; ?>>High Cholesterol</option>
    <option value="Hypertensive Heart Disease" <?php echo ($medical_profile['medical_history'] == 'Hypertensive Heart Disease') ? 'selected' : ''; ?>>Hypertensive Heart Disease</option>
    <option value="Hypothyroidism" <?php echo ($medical_profile['medical_history'] == 'Hypothyroidism') ? 'selected' : ''; ?>>Hypothyroidism</option>
    <option value="Hyperthyroidism" <?php echo ($medical_profile['medical_history'] == 'Hyperthyroidism') ? 'selected' : ''; ?>>Hyperthyroidism</option>
    <option value="Liver Disease" <?php echo ($medical_profile['medical_history'] == 'Liver Disease') ? 'selected' : ''; ?>>Liver Disease</option>
    <option value="Multiple Sclerosis" <?php echo ($medical_profile['medical_history'] == 'Multiple Sclerosis') ? 'selected' : ''; ?>>Multiple Sclerosis</option>
    <option value="Parkinson's Disease" <?php echo ($medical_profile['medical_history'] == 'Parkinson\'s Disease') ? 'selected' : ''; ?>>Parkinson's Disease</option>
    <option value="Pulmonary Fibrosis" <?php echo ($medical_profile['medical_history'] == 'Pulmonary Fibrosis') ? 'selected' : ''; ?>>Pulmonary Fibrosis</option>
    <option value="Stroke" <?php echo ($medical_profile['medical_history'] == 'Stroke') ? 'selected' : ''; ?>>Stroke</option>
    <option value="Tuberculosis" <?php echo ($medical_profile['medical_history'] == 'Tuberculosis') ? 'selected' : ''; ?>>Tuberculosis</option>
    <option value="Anemia" <?php echo ($medical_profile['medical_history'] == 'Anemia') ? 'selected' : ''; ?>>Anemia</option>
    <option value="Bipolar Disorder" <?php echo ($medical_profile['medical_history'] == 'Bipolar Disorder') ? 'selected' : ''; ?>>Bipolar Disorder</option>
    <option value="Chronic Fatigue Syndrome" <?php echo ($medical_profile['medical_history'] == 'Chronic Fatigue Syndrome') ? 'selected' : ''; ?>>Chronic Fatigue Syndrome</option>
    <option value="Crohn's Disease" <?php echo ($medical_profile['medical_history'] == 'Crohn\'s Disease') ? 'selected' : ''; ?>>Crohn's Disease</option>
    <option value="Cystic Fibrosis" <?php echo ($medical_profile['medical_history'] == 'Cystic Fibrosis') ? 'selected' : ''; ?>>Cystic Fibrosis</option>
    <option value="Dementia" <?php echo ($medical_profile['medical_history'] == 'Dementia') ? 'selected' : ''; ?>>Dementia</option>
    <option value="Endometriosis" <?php echo ($medical_profile['medical_history'] == 'Endometriosis') ? 'selected' : ''; ?>>Endometriosis</option>
    <option value="Epilepsy" <?php echo ($medical_profile['medical_history'] == 'Epilepsy') ? 'selected' : ''; ?>>Epilepsy</option>
    <option value="Fibromyalgia" <?php echo ($medical_profile['medical_history'] == 'Fibromyalgia') ? 'selected' : ''; ?>>Fibromyalgia</option>
    <option value="Gallbladder Disease" <?php echo ($medical_profile['medical_history'] == 'Gallbladder Disease') ? 'selected' : ''; ?>>Gallbladder Disease</option>
    <option value="Gout" <?php echo ($medical_profile['medical_history'] == 'Gout') ? 'selected' : ''; ?>>Gout</option>
    <option value="Hepatitis" <?php echo ($medical_profile['medical_history'] == 'Hepatitis') ? 'selected' : ''; ?>>Hepatitis</option>
    <option value="Irritable Bowel Syndrome (IBS)" <?php echo ($medical_profile['medical_history'] == 'Irritable Bowel Syndrome (IBS)') ? 'selected' : ''; ?>>Irritable Bowel Syndrome (IBS)</option>
    <option value="Knee Problems" <?php echo ($medical_profile['medical_history'] == 'Knee Problems') ? 'selected' : ''; ?>>Knee Problems</option>
    <option value="Menstrual Disorders" <?php echo ($medical_profile['medical_history'] == 'Menstrual Disorders') ? 'selected' : ''; ?>>Menstrual Disorders</option>
    <option value="Migraines" <?php echo ($medical_profile['medical_history'] == 'Migraines') ? 'selected' : ''; ?>>Migraines</option>
    <option value="Obesity" <?php echo ($medical_profile['medical_history'] == 'Obesity') ? 'selected' : ''; ?>>Obesity</option>
    <option value="Osteoporosis" <?php echo ($medical_profile['medical_history'] == 'Osteoporosis') ? 'selected' : ''; ?>>Osteoporosis</option>
    <option value="Psoriasis" <?php echo ($medical_profile['medical_history'] == 'Psoriasis') ? 'selected' : ''; ?>>Psoriasis</option>
    <option value="Rheumatoid Arthritis" <?php echo ($medical_profile['medical_history'] == 'Rheumatoid Arthritis') ? 'selected' : ''; ?>>Rheumatoid Arthritis</option>
    <option value="Schizophrenia" <?php echo ($medical_profile['medical_history'] == 'Schizophrenia') ? 'selected' : ''; ?>>Schizophrenia</option>
    <option value="Sickle Cell Anemia" <?php echo ($medical_profile['medical_history'] == 'Sickle Cell Anemia') ? 'selected' : ''; ?>>Sickle Cell Anemia</option>
    <option value="Sleep Apnea" <?php echo ($medical_profile['medical_history'] == 'Sleep Apnea') ? 'selected' : ''; ?>>Sleep Apnea</option>
    <option value="Thyroid Problems" <?php echo ($medical_profile['medical_history'] == 'Thyroid Problems') ? 'selected' : ''; ?>>Thyroid Problems</option>
    <option value="Ulcer" <?php echo ($medical_profile['medical_history'] == 'Ulcer') ? 'selected' : ''; ?>>Ulcer</option>
    <option value="Varicose Veins" <?php echo ($medical_profile['medical_history'] == 'Varicose Veins') ? 'selected' : ''; ?>>Varicose Veins</option>
    <option value="Anxiety" <?php echo ($medical_profile['medical_history'] == 'Anxiety') ? 'selected' : ''; ?>>Anxiety</option>
    <option value="Depression" <?php echo ($medical_profile['medical_history'] == 'Depression') ? 'selected' : ''; ?>>Depression</option>
    <option value="Post-Traumatic Stress Disorder (PTSD)" <?php echo ($medical_profile['medical_history'] == 'Post-Traumatic Stress Disorder (PTSD)') ? 'selected' : ''; ?>>Post-Traumatic Stress Disorder (PTSD)</option>
    <option value="Alcoholism" <?php echo ($medical_profile['medical_history'] == 'Alcoholism') ? 'selected' : ''; ?>>Alcoholism</option>
    <option value="Drug Addiction" <?php echo ($medical_profile['medical_history'] == 'Drug Addiction') ? 'selected' : ''; ?>>Drug Addiction</option>
    <option value="Alzheimer's Disease" <?php echo ($medical_profile['medical_history'] == 'Alzheimer\'s Disease') ? 'selected' : ''; ?>>Alzheimer's Disease</option>
    <option value="Aneurysm" <?php echo ($medical_profile['medical_history'] == 'Aneurysm') ? 'selected' : ''; ?>>Aneurysm</option>
    <option value="Anorexia" <?php echo ($medical_profile['medical_history'] == 'Anorexia') ? 'selected' : ''; ?>>Anorexia</option>
    <option value="Appendicitis" <?php echo ($medical_profile['medical_history'] == 'Appendicitis') ? 'selected' : ''; ?>>Appendicitis</option>
    <option value="Atrial Fibrillation" <?php echo ($medical_profile['medical_history'] == 'Atrial Fibrillation') ? 'selected' : ''; ?>>Atrial Fibrillation</option>
    <option value="Bell's Palsy" <?php echo ($medical_profile['medical_history'] == 'Bell\'s Palsy') ? 'selected' : ''; ?>>Bell's Palsy</option>
    <option value="Blood Clots" <?php echo ($medical_profile['medical_history'] == 'Blood Clots') ? 'selected' : ''; ?>>Blood Clots</option>
    <option value="Brain Tumor" <?php echo ($medical_profile['medical_history'] == 'Brain Tumor') ? 'selected' : ''; ?>>Brain Tumor</option>
    <option value="Bronchitis" <?php echo ($medical_profile['medical_history'] == 'Bronchitis') ? 'selected' : ''; ?>>Bronchitis</option>
    <option value="Bulimia" <?php echo ($medical_profile['medical_history'] == 'Bulimia') ? 'selected' : ''; ?>>Bulimia</option>
    <option value="Carpal Tunnel Syndrome" <?php echo ($medical_profile['medical_history'] == 'Carpal Tunnel Syndrome') ? 'selected' : ''; ?>>Carpal Tunnel Syndrome</option>
    <option value="Celiac Disease" <?php echo ($medical_profile['medical_history'] == 'Celiac Disease') ? 'selected' : ''; ?>>Celiac Disease</option>
    <option value="Chronic Sinusitis" <?php echo ($medical_profile['medical_history'] == 'Chronic Sinusitis') ? 'selected' : ''; ?>>Chronic Sinusitis</option>
    <option value="Cirrhosis" <?php echo ($medical_profile['medical_history'] == 'Cirrhosis') ? 'selected' : ''; ?>>Cirrhosis</option>
    <option value="Colitis" <?php echo ($medical_profile['medical_history'] == 'Colitis') ? 'selected' : ''; ?>>Colitis</option>
    <option value="Concussion" <?php echo ($medical_profile['medical_history'] == 'Concussion') ? 'selected' : ''; ?>>Concussion</option>
    <option value="Coronary Artery Disease" <?php echo ($medical_profile['medical_history'] == 'Coronary Artery Disease') ? 'selected' : ''; ?>>Coronary Artery Disease</option>
    <option value="Deep Vein Thrombosis" <?php echo ($medical_profile['medical_history'] == 'Deep Vein Thrombosis') ? 'selected' : ''; ?>>Deep Vein Thrombosis</option>
    <option value="Dyslexia" <?php echo ($medical_profile['medical_history'] == 'Dyslexia') ? 'selected' : ''; ?>>Dyslexia</option>
    <option value="Emphysema" <?php echo ($medical_profile['medical_history'] == 'Emphysema') ? 'selected' : ''; ?>>Emphysema</option>
    <option value="Endocrine Disorders" <?php echo ($medical_profile['medical_history'] == 'Endocrine Disorders') ? 'selected' : ''; ?>>Endocrine Disorders</option>
    <option value="Enlarged Prostate" <?php echo ($medical_profile['medical_history'] == 'Enlarged Prostate') ? 'selected' : ''; ?>>Enlarged Prostate</option>
    <option value="Erectile Dysfunction" <?php echo ($medical_profile['medical_history'] == 'Erectile Dysfunction') ? 'selected' : ''; ?>>Erectile Dysfunction</option>
    <option value="Esophageal Cancer" <?php echo ($medical_profile['medical_history'] == 'Esophageal Cancer') ? 'selected' : ''; ?>>Esophageal Cancer</option>
    <option value="Gallstones" <?php echo ($medical_profile['medical_history'] == 'Gallstones') ? 'selected' : ''; ?>>Gallstones</option>
    <option value="Glaucoma" <?php echo ($medical_profile['medical_history'] == 'Glaucoma') ? 'selected' : ''; ?>>Glaucoma</option>
    <option value="Gum Disease" <?php echo ($medical_profile['medical_history'] == 'Gum Disease') ? 'selected' : ''; ?>>Gum Disease</option>
    <option value="Hearing Loss" <?php echo ($medical_profile['medical_history'] == 'Hearing Loss') ? 'selected' : ''; ?>>Hearing Loss</option>
    <option value="Hemophilia" <?php echo ($medical_profile['medical_history'] == 'Hemophilia') ? 'selected' : ''; ?>>Hemophilia</option>
    <option value="Herniated Disc" <?php echo ($medical_profile['medical_history'] == 'Herniated Disc') ? 'selected' : ''; ?>>Herniated Disc</option>
    <option value="Huntington's Disease" <?php echo ($medical_profile['medical_history'] == 'Huntington\'s Disease') ? 'selected' : ''; ?>>Huntington's Disease</option>
    <option value="Influenza" <?php echo ($medical_profile['medical_history'] == 'Influenza') ? 'selected' : ''; ?>>Influenza</option>
    <option value="Kidney Stones" <?php echo ($medical_profile['medical_history'] == 'Kidney Stones') ? 'selected' : ''; ?>>Kidney Stones</option>
    <option value="Leukemia" <?php echo ($medical_profile['medical_history'] == 'Leukemia') ? 'selected' : ''; ?>>Leukemia</option>
    <option value="Lupus" <?php echo ($medical_profile['medical_history'] == 'Lupus') ? 'selected' : ''; ?>>Lupus</option>
    <option value="Lyme Disease" <?php echo ($medical_profile['medical_history'] == 'Lyme Disease') ? 'selected' : ''; ?>>Lyme Disease</option>
    <option value="Malaria" <?php echo ($medical_profile['medical_history'] == 'Malaria') ? 'selected' : ''; ?>>Malaria</option>
    <option value="Meningitis" <?php echo ($medical_profile['medical_history'] == 'Meningitis') ? 'selected' : ''; ?>>Meningitis</option>
    <option value="Motor Neuron Disease" <?php echo ($medical_profile['medical_history'] == 'Motor Neuron Disease') ? 'selected' : ''; ?>>Motor Neuron Disease</option>
    <option value="Muscular Dystrophy" <?php echo ($medical_profile['medical_history'] == 'Muscular Dystrophy') ? 'selected' : ''; ?>>Muscular Dystrophy</option>
    <option value="Pancreatitis" <?php echo ($medical_profile['medical_history'] == 'Pancreatitis') ? 'selected' : ''; ?>>Pancreatitis</option>
    <option value="Pneumonia" <?php echo ($medical_profile['medical_history'] == 'Pneumonia') ? 'selected' : ''; ?>>Pneumonia</option>
    <option value="Polio" <?php echo ($medical_profile['medical_history'] == 'Polio') ? 'selected' : ''; ?>>Polio</option>
    <option value="Prostate Cancer" <?php echo ($medical_profile['medical_history'] == 'Prostate Cancer') ? 'selected' : ''; ?>>Prostate Cancer</option>
    <option value="Raynaud's Disease" <?php echo ($medical_profile['medical_history'] == 'Raynaud\'s Disease') ? 'selected' : ''; ?>>Raynaud's Disease</option>
    <option value="Sarcoidosis" <?php echo ($medical_profile['medical_history'] == 'Sarcoidosis') ? 'selected' : ''; ?>>Sarcoidosis</option>
    <option value="Seizures" <?php echo ($medical_profile['medical_history'] == 'Seizures') ? 'selected' : ''; ?>>Seizures</option>
    <option value="Spinal Stenosis" <?php echo ($medical_profile['medical_history'] == 'Spinal Stenosis') ? 'selected' : ''; ?>>Spinal Stenosis</option>
    <option value="Tendonitis" <?php echo ($medical_profile['medical_history'] == 'Tendonitis') ? 'selected' : ''; ?>>Tendonitis</option>
    <option value="Tonsillitis" <?php echo ($medical_profile['medical_history'] == 'Tonsillitis') ? 'selected' : ''; ?>>Tonsillitis</option>
    <option value="Trigeminal Neuralgia" <?php echo ($medical_profile['medical_history'] == 'Trigeminal Neuralgia') ? 'selected' : ''; ?>>Trigeminal Neuralgia</option>
    <option value="Ulcerative Colitis" <?php echo ($medical_profile['medical_history'] == 'Ulcerative Colitis') ? 'selected' : ''; ?>>Ulcerative Colitis</option>
    <option value="Varicose Veins" <?php echo ($medical_profile['medical_history'] == 'Varicose Veins') ? 'selected' : ''; ?>>Varicose Veins</option>
    <option value="Viral Hepatitis" <?php echo ($medical_profile['medical_history'] == 'Viral Hepatitis') ? 'selected' : ''; ?>>Viral Hepatitis</option>
    <option value="Vitiligo" <?php echo ($medical_profile['medical_history'] == 'Vitiligo') ? 'selected' : ''; ?>>Vitiligo</option>

    <option value="None" <?php echo ($medical_profile['medical_history'] == 'None') ? 'selected' : ''; ?>>None</option>
        </select>


        
 

        <label for="allergies">Allergies:</label>
        <select name="allergies" id="allergies" required>
            <option value="Peanut Allergy" <?php echo ($medical_profile['allergies'] == 'Peanut Allergy') ? 'selected' : ''; ?>>Peanut Allergy</option>
    <option value="Shellfish Allergy" <?php echo ($medical_profile['allergies'] == 'Shellfish Allergy') ? 'selected' : ''; ?>>Shellfish Allergy</option>
    <option value="Milk Allergy" <?php echo ($medical_profile['allergies'] == 'Milk Allergy') ? 'selected' : ''; ?>>Milk Allergy</option>
    <option value="Egg Allergy" <?php echo ($medical_profile['allergies'] == 'Egg Allergy') ? 'selected' : ''; ?>>Egg Allergy</option>
    <option value="Tree Nut Allergy" <?php echo ($medical_profile['allergies'] == 'Tree Nut Allergy') ? 'selected' : ''; ?>>Tree Nut Allergy</option>
    <option value="Soy Allergy" <?php echo ($medical_profile['allergies'] == 'Soy Allergy') ? 'selected' : ''; ?>>Soy Allergy</option>
    <option value="Wheat Allergy" <?php echo ($medical_profile['allergies'] == 'Wheat Allergy') ? 'selected' : ''; ?>>Wheat Allergy</option>
    <option value="Fish Allergy" <?php echo ($medical_profile['allergies'] == 'Fish Allergy') ? 'selected' : ''; ?>>Fish Allergy</option>
    <option value="Sesame Allergy" <?php echo ($medical_profile['allergies'] == 'Sesame Allergy') ? 'selected' : ''; ?>>Sesame Allergy</option>
    <option value="Latex Allergy" <?php echo ($medical_profile['allergies'] == 'Latex Allergy') ? 'selected' : ''; ?>>Latex Allergy</option>
    <option value="Insect Sting Allergy" <?php echo ($medical_profile['allergies'] == 'Insect Sting Allergy') ? 'selected' : ''; ?>>Insect Sting Allergy</option>
    <option value="Dust Mite Allergy" <?php echo ($medical_profile['allergies'] == 'Dust Mite Allergy') ? 'selected' : ''; ?>>Dust Mite Allergy</option>
    <option value="Pollen Allergy" <?php echo ($medical_profile['allergies'] == 'Pollen Allergy') ? 'selected' : ''; ?>>Pollen Allergy</option>
    <option value="Mold Allergy" <?php echo ($medical_profile['allergies'] == 'Mold Allergy') ? 'selected' : ''; ?>>Mold Allergy</option>
    <option value="Animal Dander Allergy" <?php echo ($medical_profile['allergies'] == 'Animal Dander Allergy') ? 'selected' : ''; ?>>Animal Dander Allergy</option>
    <option value="Drug Allergy" <?php echo ($medical_profile['allergies'] == 'Drug Allergy') ? 'selected' : ''; ?>>Drug Allergy</option>
    <option value="Perfume Allergy" <?php echo ($medical_profile['allergies'] == 'Perfume Allergy') ? 'selected' : ''; ?>>Perfume Allergy</option>
    <option value="Nickel Allergy" <?php echo ($medical_profile['allergies'] == 'Nickel Allergy') ? 'selected' : ''; ?>>Nickel Allergy</option>
    <option value="Sun Allergy" <?php echo ($medical_profile['allergies'] == 'Sun Allergy') ? 'selected' : ''; ?>>Sun Allergy</option>
    <option value="Cockroach Allergy" <?php echo ($medical_profile['allergies'] == 'Cockroach Allergy') ? 'selected' : ''; ?>>Cockroach Allergy</option>
    <option value="Cold Allergy" <?php echo ($medical_profile['allergies'] == 'Cold Allergy') ? 'selected' : ''; ?>>Cold Allergy</option>
    <option value="Sulfa Drugs Allergy" <?php echo ($medical_profile['allergies'] == 'Sulfa Drugs Allergy') ? 'selected' : ''; ?>>Sulfa Drugs Allergy</option>
    <option value="Penicillin Allergy" <?php echo ($medical_profile['allergies'] == 'Penicillin Allergy') ? 'selected' : ''; ?>>Penicillin Allergy</option>
    <option value="Aspirin Allergy" <?php echo ($medical_profile['allergies'] == 'Aspirin Allergy') ? 'selected' : ''; ?>>Aspirin Allergy</option>
    <option value="Fragrance Allergy" <?php echo ($medical_profile['allergies'] == 'Fragrance Allergy') ? 'selected' : ''; ?>>Fragrance Allergy</option>
    <option value="Alcohol Allergy" <?php echo ($medical_profile['allergies'] == 'Alcohol Allergy') ? 'selected' : ''; ?>>Alcohol Allergy</option>
    <option value="Chemical Allergy" <?php echo ($medical_profile['allergies'] == 'Chemical Allergy') ? 'selected' : ''; ?>>Chemical Allergy</option>
    <option value="Formaldehyde Allergy" <?php echo ($medical_profile['allergies'] == 'Formaldehyde Allergy') ? 'selected' : ''; ?>>Formaldehyde Allergy</option>
    <option value="Cobalt Allergy" <?php echo ($medical_profile['allergies'] == 'Cobalt Allergy') ? 'selected' : ''; ?>>Cobalt Allergy</option>
    <option value="Platinum Allergy" <?php echo ($medical_profile['allergies'] == 'Platinum Allergy') ? 'selected' : ''; ?>>Platinum Allergy</option>
    <option value="Carbamate Allergy" <?php echo ($medical_profile['allergies'] == 'Carbamate Allergy') ? 'selected' : ''; ?>>Carbamate Allergy</option>
    <option value="Chlorine Allergy" <?php echo ($medical_profile['allergies'] == 'Chlorine Allergy') ? 'selected' : ''; ?>>Chlorine Allergy</option>
    <option value="Mercury Allergy" <?php echo ($medical_profile['allergies'] == 'Mercury Allergy') ? 'selected' : ''; ?>>Mercury Allergy</option>
    <option value="Caffeine Allergy" <?php echo ($medical_profile['allergies'] == 'Caffeine Allergy') ? 'selected' : ''; ?>>Caffeine Allergy</option>
    <option value="Meat Allergy" <?php echo ($medical_profile['allergies'] == 'Meat Allergy') ? 'selected' : ''; ?>>Meat Allergy</option>
    <option value="Chicken Allergy" <?php echo ($medical_profile['allergies'] == 'Chicken Allergy') ? 'selected' : ''; ?>>Chicken Allergy</option>
    <option value="Beef Allergy" <?php echo ($medical_profile['allergies'] == 'Beef Allergy') ? 'selected' : ''; ?>>Beef Allergy</option>
    <option value="Pork Allergy" <?php echo ($medical_profile['allergies'] == 'Pork Allergy') ? 'selected' : ''; ?>>Pork Allergy</option>
    <option value="Corn Allergy" <?php echo ($medical_profile['allergies'] == 'Corn Allergy') ? 'selected' : ''; ?>>Corn Allergy</option>
    <option value="Gelatin Allergy" <?php echo ($medical_profile['allergies'] == 'Gelatin Allergy') ? 'selected' : ''; ?>>Gelatin Allergy</option>
    <option value="Yeast Allergy" <?php echo ($medical_profile['allergies'] == 'Yeast Allergy') ? 'selected' : ''; ?>>Yeast Allergy</option>
    <option value="Sunflower Allergy" <?php echo ($medical_profile['allergies'] == 'Sunflower Allergy') ? 'selected' : ''; ?>>Sunflower Allergy</option>
    <option value="Food Dye Allergy" <?php echo ($medical_profile['allergies'] == 'Food Dye Allergy') ? 'selected' : ''; ?>>Food Dye Allergy</option>
    <option value="Grapes Allergy" <?php echo ($medical_profile['allergies'] == 'Grapes Allergy') ? 'selected' : ''; ?>>Grapes Allergy</option>
    <option value="Avocado Allergy" <?php echo ($medical_profile['allergies'] == 'Avocado Allergy') ? 'selected' : ''; ?>>Avocado Allergy</option>
    <option value="Garlic Allergy" <?php echo ($medical_profile['allergies'] == 'Garlic Allergy') ? 'selected' : ''; ?>>Garlic Allergy</option>
    <option value="Onion Allergy" <?php echo ($medical_profile['allergies'] == 'Onion Allergy') ? 'selected' : ''; ?>>Onion Allergy</option>
    <option value="Tomato Allergy" <?php echo ($medical_profile['allergies'] == 'Tomato Allergy') ? 'selected' : ''; ?>>Tomato Allergy</option>
    <option value="Banana Allergy" <?php echo ($medical_profile['allergies'] == 'Banana Allergy') ? 'selected' : ''; ?>>Banana Allergy</option>
    <option value="Kiwi Allergy" <?php echo ($medical_profile['allergies'] == 'Kiwi Allergy') ? 'selected' : ''; ?>>Kiwi Allergy</option>
    <option value="Apple Allergy" <?php echo ($medical_profile['allergies'] == 'Apple Allergy') ? 'selected' : ''; ?>>Apple Allergy</option>
    <option value="Citrus Allergy" <?php echo ($medical_profile['allergies'] == 'Citrus Allergy') ? 'selected' : ''; ?>>Citrus Allergy</option>
    <option value="Strawberry Allergy" <?php echo ($medical_profile['allergies'] == 'Strawberry Allergy') ? 'selected' : ''; ?>>Strawberry Allergy</option>
    <option value="Blueberry Allergy" <?php echo ($medical_profile['allergies'] == 'Blueberry Allergy') ? 'selected' : ''; ?>>Blueberry Allergy</option>
    <option value="Peach Allergy" <?php echo ($medical_profile['allergies'] == 'Peach Allergy') ? 'selected' : ''; ?>>Peach Allergy</option>
    <option value="Plum Allergy" <?php echo ($medical_profile['allergies'] == 'Plum Allergy') ? 'selected' : ''; ?>>Plum Allergy</option>
    <option value="Pineapple Allergy" <?php echo ($medical_profile['allergies'] == 'Pineapple Allergy') ? 'selected' : ''; ?>>Pineapple Allergy</option>
    <option value="Mango Allergy" <?php echo ($medical_profile['allergies'] == 'Mango Allergy') ? 'selected' : ''; ?>>Mango Allergy</option>
    <option value="Coconut Allergy" <?php echo ($medical_profile['allergies'] == 'Coconut Allergy') ? 'selected' : ''; ?>>Coconut Allergy</option>
    <option value="Mustard Allergy" <?php echo ($medical_profile['allergies'] == 'Mustard Allergy') ? 'selected' : ''; ?>>Mustard Allergy</option>
    <option value="Sulfite Allergy" <?php echo ($medical_profile['allergies'] == 'Sulfite Allergy') ? 'selected' : ''; ?>>Sulfite Allergy</option>
    <option value="Monosodium Glutamate (MSG) Allergy" <?php echo ($medical_profile['allergies'] == 'Monosodium Glutamate (MSG) Allergy') ? 'selected' : ''; ?>>Monosodium Glutamate (MSG) Allergy</option>
    <option value="Histamine Intolerance" <?php echo ($medical_profile['allergies'] == 'Histamine Intolerance') ? 'selected' : ''; ?>>Histamine Intolerance</option>
    <option value="Lactose Intolerance" <?php echo ($medical_profile['allergies'] == 'Lactose Intolerance') ? 'selected' : ''; ?>>Lactose Intolerance</option>
    <option value="Gluten Intolerance" <?php echo ($medical_profile['allergies'] == 'Gluten Intolerance') ? 'selected' : ''; ?>>Gluten Intolerance</option>
    <option value="Salicylate Intolerance" <?php echo ($medical_profile['allergies'] == 'Salicylate Intolerance') ? 'selected' : ''; ?>>Salicylate Intolerance</option>
    <option value="Tyramine Sensitivity" <?php echo ($medical_profile['allergies'] == 'Tyramine Sensitivity') ? 'selected' : ''; ?>>Tyramine Sensitivity</option>
    <option value="Azo Dye Allergy" <?php echo ($medical_profile['allergies'] == 'Azo Dye Allergy') ? 'selected' : ''; ?>>Azo Dye Allergy</option>
    <option value="Polyester Allergy" <?php echo ($medical_profile['allergies'] == 'Polyester Allergy') ? 'selected' : ''; ?>>Polyester Allergy</option>
    <option value="Wool Allergy" <?php echo ($medical_profile['allergies'] == 'Wool Allergy') ? 'selected' : ''; ?>>Wool Allergy</option>
    <option value="Synthetic Fragrance Allergy" <?php echo ($medical_profile['allergies'] == 'Synthetic Fragrance Allergy') ? 'selected' : ''; ?>>Synthetic Fragrance Allergy</option>
    <option value="Hair Dye Allergy" <?php echo ($medical_profile['allergies'] == 'Hair Dye Allergy') ? 'selected' : ''; ?>>Hair Dye Allergy</option>
    <option value="Henna Allergy" <?php echo ($medical_profile['allergies'] == 'Henna Allergy') ? 'selected' : ''; ?>>Henna Allergy</option>
    <option value="Nail Polish Allergy" <?php echo ($medical_profile['allergies'] == 'Nail Polish Allergy') ? 'selected' : ''; ?>>Nail Polish Allergy</option>
    <option value="Gold Allergy" <?php echo ($medical_profile['allergies'] == 'Gold Allergy') ? 'selected' : ''; ?>>Gold Allergy</option>
    <option value="Silver Allergy" <?php echo ($medical_profile['allergies'] == 'Silver Allergy') ? 'selected' : ''; ?>>Silver Allergy</option>
    <option value="Zinc Allergy" <?php echo ($medical_profile['allergies'] == 'Zinc Allergy') ? 'selected' : ''; ?>>Zinc Allergy</option>
    <option value="Plastic Allergy" <?php echo ($medical_profile['allergies'] == 'Plastic Allergy') ? 'selected' : ''; ?>>Plastic Allergy</option>
    <option value="Detergent Allergy" <?php echo ($medical_profile['allergies'] == 'Detergent Allergy') ? 'selected' : ''; ?>>Detergent Allergy</option>

    <option value="None" <?php echo ($medical_profile['allergies'] == 'None') ? 'selected' : ''; ?>>None</option>
        </select>

        <label for="emergency_contact_phone">Emergency Contact Phone:</label>
        <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" required value="<?php echo $medical_profile['emergency_contact_phone']; ?>">

        <button type="submit">Update Profile</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include "footer.php"; ?>




</body>
</html>
