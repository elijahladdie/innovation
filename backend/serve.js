import dotenv from 'dotenv';
import express from 'express';
import mongoose from 'mongoose';
import DataModel from "./model/blackcoffer.model";
import cors from 'cors'

dotenv.config();

const app = express();
app.use(cors())
const port = process.env.PORT || 3000;

const dbURL = "mongodb+srv://elijahladdie2004:Q35DcABwWIUgvimG@cluster0.mbain0i.mongodb.net/blackcoffer_db";

mongoose.connect(dbURL, {
  useNewUrlParser: true,
  useUnifiedTopology: true,
})
  .then(() => {
    console.log('Connected to MongoDB');
    app.listen(port, () => {
      console.log(`Server is running on port ${port}`);
    });
  })
  .catch((err) => {
    console.error('MongoDB connection error:', err);
  });

app.get('/', (req, res) => {
  DataModel.find()
    .then((data) => {
      if (data.length > 0) {
        res.send(data);
      } else {
        res.send({ message: "No data found in the database" });
      }
    })
    .catch((err) => {
      console.error('Error querying MongoDB:', err);
      res.status(500).send({ error: 'Internal server error' });
    });
});
