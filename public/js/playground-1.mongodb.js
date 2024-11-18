// Select the database to use.
use('Arcadia');

// Insert a few documents into the sales collection.
db.getCollection('animalConsultation').insertMany([
    { animal_name: "Panthera onca", consultations: 10 },
    { animal_name: "Alouatta", consultations: 5 },
    { animal_name: "Ramphastos", consultations: 7 },
    { animal_name: "Bradypus", consultations: 3 },
    { animal_name: "Panthera leo", consultations: 10 },
    { animal_name: "Loxodonta", consultations: 5 },
    { animal_name: "Acinonyx jubatus", consultations: 7 },
    { animal_name: "Equus quagga", consultations: 3 },
    { animal_name: "Alligator mississippiensis", consultations: 10 },
    { animal_name: "Ardea herodias", consultations: 5 },
    { animal_name: "Apalone spinifera", consultations: 7 },
    { animal_name: "Lithobates catesbeianus", consultations: 3 }
]);

