
import OpenAI from "openai";

const openai = new OpenAI({ apiKey: process.env.OPENAI_API_KEY });

export default async function handler(req:any,res:any){
  const {message}=req.body;

  const completion = await openai.chat.completions.create({
    model:"gpt-4o-mini",
    messages:[{role:"user",content:message}]
  });

  res.json({reply: completion.choices[0].message.content});
}
