import * as fs from 'fs'
import * as path from 'path'

async function walk(dir) {
    let files = []
    let entries = fs.readdirSync(dir)

    entries.forEach((entry) => {
        let entrypath = path.join(dir, entry)
        const stats = fs.statSync(entrypath)
        if (stats.isDirectory()) {
            let filesWalk = walk(entrypath)
            files.concat(filesWalk)
        } else if (stats.isFile()) {
            files.push(entrypath)
        }
    })
    return files
}

let files = walk('resources/')
console.log(files)