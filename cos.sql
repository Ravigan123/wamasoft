INSERT INTO danes VALUES ('', "2022-06-27 13:20:01", "solaris12", "", "0 - 87", "");
INSERT INTO danes (id, date, server, offline, statusGPU, statusBuffer) VALUES ('', "2022-06-27 13:20:01", "solaris12", "", "0 - 87", "");
INSERT INTO servers (id, name, ip_server) VALUES ('1','solaris12','192.168.0.2');
INSERT INTO cameras (id, ipcamera, status) VALUES ('1','192.168.0.13', true);
INSERT INTO camera_server (server_id, camera_id) VALUES ('1','2');
INSERT INTO titles (id, name) VALUES ('1','statusGPU');
INSERT INTO serverTitles (server_id, title_id) VALUES ('1','1');
INSERT INTO quality (id, date, key, value, serverTitle_id) VALUES ('1','2022-06-27 13:20:01', '0', '85', '1');
$table->id();
            $table->dateTime('date');
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            $table->foreignId('serverTitle_id')->constrained();

<!-- <td> <a href="{{ route('delete', ['id' => $item->id]) }}" class="btn btn-danger"></a></td> -->
  <!-- <form action="{{ route('dane.delete', ['id' => $item->id])}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form> -->


select movies.id, movies.name
from movies inner join actors_movies
on actors_movies.movie_id=movies.id
where actors_movies.actor_id=$actor_id

select servers.id, titles.name
from servers, titles inner join serverTitles
on serverTitles.server_id=servers.id
-- where serverTitles.title_id=titles.id;


select servers.name, titles.name
from serverTitles, titles inner join servers
on serverTitles.server_id=.id
where serverTitles.title_id='1';


SELECT servers.name, titles.name, qualities.worth FROM servers LEFT JOIN serverTitles ON servers.id = serverTitles.server_id LEFT JOIN titles ON serverTitles.title_id = titles.id LEFT JOIN qualities ON serverTitles.id = qualities.serverTitle_id;

SELECT servers.name, titles.name, qualities.worth FROM servers LEFT JOIN serverTitles ON servers.id = serverTitles.server_id LEFT JOIN titles ON serverTitles.title_id = titles.id LEFT JOIN qualities ON serverTitles.id = qualities.serverTitle_id WHERE servers.name = 'server2' and titles.name = "statusCPU";


INSERT INTO server_titles (id,server_id, title_id) VALUES ('SELECT id FROM servers WHERE name="server2"','1');
INSERT INTO server_titles (server_id, title_id) VALUES ('2','1');

SELECT id FROM servers WHERE name="server2";

insert into prices (group, id, price)
select 
    7, articleId, 1.50
from article where name like 'ABC%';



HISTORIA

 $dane = DB::table('servers')
            ->join('serverTitles', 'servers.id', '=', 'serverTitles.server_id')
            ->join('titles', 'titles.id', '=', 'serverTitles.title_id')
            ->join('qualities', 'qualities.serverTitle_id', '=', 'serverTitles.id')
            ->select('servers.name', 'titles.name_title', 'qualities.worth')
            ->where('titles.name_title', 'statusCPU')
            ->where('servers.name', 'server2')
            ->get();

HISTORIA v2

SELECT qualities.date,qualities.code, qualities.worth as 'StatusGPU'
FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id WHERE  titles.name_title = "statusGPU" and servers.name = 'solaris12'


  
/*SELECT servers.name, titles.name_title, qualities.worth FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id;*/


SELECT qualities.worth FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id where titles.name_title = 'statusCPU';

SELECT servers.name, titles.name_title, qualities.worth FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id where titles.name_title = 'statusGPU';





dobre

SELECT servers.name, 
  max(case when titles.name_title = 'statusCPU' then concat(qualities.code,"-", qualities.worth) else 0 end) as statusCPU,
  max(case when titles.name_title = 'statusGPU' then qualities.worth else 0 end) as statusGPU
FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id WHERE qualities.id IN (SELECT MAX(id) AS id
             FROM qualities  
             GROUP BY serverTitle_id) GROUP BY servers.name ;



             SELECT servers.name, 
  max(case when cameras.ip_camera= 'offline' then cameras.ip_camera else 0 end) as offline,
  max(case when titles.name_title = 'statusCPU' then concat(qualities.code,"-", qualities.worth) else 0 end) as statusCPU,
  max(case when titles.name_title = 'statusGPU' then qualities.worth else 0 end) as statusGPU
FROM servers INNER JOIN serverTitles ON servers.id = serverTitles.server_id INNER JOIN titles ON serverTitles.title_id = titles.id INNER JOIN qualities ON serverTitles.id = qualities.serverTitle_id  INNER JOIN cameraServers ON cameraServers.server_id = servers.id INNER JOIN cameras ON cameraServers.camera_id = cameras.id INNER JOIN cameraValues ON cameraValues.cameraServer_id = cameras.id  WHERE qualities.id IN (SELECT MAX(id) AS id
             FROM qualities  
             GROUP BY serverTitle_id) GROUP BY servers.name ;



kamery

SELECT servers.name, cameras.ip_camera, cameraValues.status FROM servers INNER JOIN cameraServers ON servers.id = cameraServers.server_id INNER JOIN cameras ON cameraServers.camera_id = cameras.id INNER JOIN cameraValues ON cameraValues.cameraServer_id = cameraServers.id;