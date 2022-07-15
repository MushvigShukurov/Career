new TypeIt("#ustablogger", {
        speed: 100,
        startDelay: 900
    })
    .type("ustablog", { delay: 1300 })
    .move(-7, { delay: 100 })
    .type('U', { delay: 400 })
    .move(null, { to: 'START', instant: true, delay: 300 })
    .move(1, { delay: 200 })
    .delete(1)
    // .type('T', { delay: 225 })
    .pause(200)
    .move(2, { instant: true })
    .pause(200)
    .move(5, { instant: true })
    .move(5, { delay: 200 })
    .type('g', { delay: 350 })
    .move(null, { to: 'END' })
    .type('er.com')
    .move(null, { to: 'END' })
    .delete('.place', { delay: 800, instant: true })
    .go();