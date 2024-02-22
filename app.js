// app.js (or index.js)

const express = require('express');
const app = express();
const port = 3000;

// Sample data
const appData = [
  { id: 1, name: 'Item 1' },
  { id: 2, name: 'Item 2' },
  { id: 3, name: 'Item 3' },
];

// API route to fetch app data
app.get('/api/app-data', (req, res) => {
  res.json(appData);
});

app.listen(port, () => {
  console.log(`App listening at http://localhost:${port}`);
});
