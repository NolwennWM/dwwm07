"use strict";
// version stagiaire :
async function tricolors(params) {
    await vert();
    await orange();
    await rouge();
    tricolors();
}

// version formateur :
async function step(){
    await switchPromise(2000, 2);
    await switchPromise(3000, 1);
    await switchPromise(1000, 0);
    step();
}
step()