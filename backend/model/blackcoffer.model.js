import mongoose from "mongoose";

const Schema = mongoose.Schema;

const dataSchema = new mongoose.Schema({
      end_year: Date,
      intensity: String,
      sector: String,
      topic: String,
      insight: String,
      url: String,
      region: String,
      start_year: Date,
      impact: String,
      added: Date,
      published: Date,
      country: String,
      relevance: String,
      pestle: String,
      source: String,
      title: String,
      likelihood: String
    });
    
    const DataModel = mongoose.model('users', dataSchema);
    
   export default DataModel;
