const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();
const PORT = process.env.PORT || 3000;

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/clients', {
    useNewUrlParser: true,
    useUnifiedTopology: true
})
.then(() => console.log('Connected to MongoDB'))
.catch(err => console.error('Error connecting to MongoDB:', err));

// Create a schema for the clients
const clientSchema = new mongoose.Schema({
    username: String,
    password: String
});

const Client = mongoose.model('Client', clientSchema);

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

// Handle login POST request
app.post('/login', async (req, res) => {
    const { username, password } = req.body;
    try {
        const client = await Client.findOne({ username, password });
        if (client) {
            res.send('Login successful!');
        } else {
            res.send('Invalid username or password.');
        }
    } catch (err) {
        console.error('Error during login:', err);
        res.status(500).send('Internal Server Error');
    }
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
