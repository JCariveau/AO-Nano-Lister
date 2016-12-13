SELECT nanos.profession,
       nanolines.name AS nanoline,
       aoItems.ql,
       aoItems.name,
       aoItems.aoid,
       aoItems.icon,
       nanos.location
  FROM aoItems
       JOIN
       nanos ON aoItems.aoid = nanos.lowid
       JOIN
       nano_nanolines_ref ON nanos.lowid = nano_nanolines_ref.lowid
       JOIN
       nanolines ON nano_nanolines_ref.nanolineid = nanolines.id
 ORDER BY nanos.profession ASC,
          nanoline ASC,
          aoItems.ql ASC,
          aoItems.name ASC;
