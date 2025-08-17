import { promises as fs } from 'fs';

export async function generateHTML(src, title) {
  title === "undefined" || title === "" ? title = "index" : title;
  try {
    await fs.writeFile(title+".html", src);
  } catch (err) {
    console.error(err);
  }
}