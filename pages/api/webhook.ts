
import Stripe from "stripe";

const stripe = new Stripe(process.env.STRIPE_SECRET_KEY!);

export default async function handler(req:any,res:any){
  res.status(200).end(); // simplified placeholder
}
