
use('adepti');


db.getCollection('infadepti').insertMany([
    { nume: 'Lolek', prenume: 'Bolek', domiciliu: 'townsville', parola: 'password123', image: null },
    { nume: 'Stan', prenume: 'Bran', domiciliu: 'narnia', parola: 'securepassword', image: null },
    { nume: 'Srinivasa', prenume: 'Ramanujan', domiciliu: 'india', parola: 'mathgenius', image: null }
]);
