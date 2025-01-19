const samples = {
    muestra1: {
        texture: "Arcilloso arenoso",
        clay: "12%",
        silt: "12%",
        sand: "12%",
        moisture: "30%",
        wetWeight: "5,12",
        dryWeight: "5,12",
        porosity: "0.7",
        image: "Imagenes/Arcilloso.png",
        description: "El suelo granular es un tipo de material geológico compuesto predominantemente por partículas grandes y no cohesivas."
    },
    muestra2: {
        texture: "Arenoso",
        clay: "5%",
        silt: "10%",
        sand: "85%",
        moisture: "20%",
        wetWeight: "4,50",
        dryWeight: "4,00",
        porosity: "0.6",
        image: "Imagenes/Arenoso.png",
        description: "El suelo arenoso tiene una alta permeabilidad y está compuesto principalmente por arena."
    },
    muestra3: {
        texture: "Limoso",
        clay: "8%",
        silt: "70%",
        sand: "22%",
        moisture: "25%",
        wetWeight: "5,80",
        dryWeight: "5,20",
        porosity: "0.65",
        image: "Imagenes/Limoso.png",
        description: "El suelo limoso tiene partículas pequeñas con buena retención de agua."
    }
};

function updateInfo() {
    const select = document.getElementById("sampleSelect");
    const sample = samples[select.value];

    document.getElementById("texture").textContent = sample.texture;
    document.getElementById("clay").textContent = sample.clay;
    document.getElementById("silt").textContent = sample.silt;
    document.getElementById("sand").textContent = sample.sand;
    document.getElementById("moisture").textContent = sample.moisture;
    document.getElementById("wetWeight").textContent = sample.wetWeight;
    document.getElementById("dryWeight").textContent = sample.dryWeight;
    document.getElementById("porosity").textContent = sample.porosity;
    document.getElementById("textureImage").src = sample.image;
    document.getElementById("description").textContent = sample.description;
}